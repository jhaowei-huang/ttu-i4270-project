<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateEmailPost;
use App\Http\Requests\UpdatePasswordPost;
use App\Http\Requests\UpdateProfilePost;
use App\Mail\VerificationEmail;
use App\Model\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use Webpatser\Uuid\Uuid;

class UserProfileController extends Controller
{
    protected $redirectTo = '/';

    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * 顯示個人資訊
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('auth.profile');
    }

    /**
     * 更新個人資訊
     *
     * @param UpdateProfilePost $request
     * @return \Illuminate\Http\Response
     */
    public function updateProfile(UpdateProfilePost $request)
    {
        $user = Auth::user();

        User::where('user_id', $user->user_id)->first()
            ->update([
                'name' => $request->name,
                'address' => $request->address,
                'department' => $request->department,
                'job_title' => $request->job_title,
                'phone' => $request->phone,
                'phone_ext' => $request->phone_ext,
                'fax' => $request->fax,
                'fax_ext' => $request->fax_ext,
            ]);

        session(['message' => '個人資料更新成功']);

        return response()->json([
            'redirect' => '/profile'
        ]);
    }

    /**
     * 顯示修改密碼畫面
     *
     * @return \Illuminate\Http\Response
     */
    public function showUpdatePassword()
    {
        return view('auth.updatePassword');
    }

    /**
     * 顯示修改email畫面
     *
     * @return \Illuminate\Http\Response
     */
    public function showUpdateEmail()
    {
        return view('auth.updateEmail');
    }

    /**
     * 修改密碼
     *
     * @param UpdatePasswordPost $request
     * @return \Illuminate\Http\Response
     */
    public function updatePassword(UpdatePasswordPost $request)
    {
        $user = Auth::user();

        if (!Hash::check($request->get('old_password'), $user->password)) {
            return response()->json([
                'errors' => [
                    'old_password' => trans('validation.updatePassword.old_password.error')
                ]
            ], 422);
        }

        $user->password = Hash::make($request->get('password'));
        $user->save();

        app('db')->table('sessions')
            ->where('user_id', $user->user_id)->delete();

        session(['message' => '密碼修改成功']);

        return response()->json([
            'redirect' => '/signIn',
            'errors' => []
        ]);
    }

    /**
     * 修改email
     *
     * @param \App\Http\Requests\UpdateEmailPost $request
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function updateEmail(UpdateEmailPost $request)
    {
        $user = Auth::user();

        if ($user->email === $request->get('email')) {
            return response()->json([
                'errors' => [
                    'email' => trans('validation.updateEmail.email.same')
                ]
            ], 422);
        }

        $user->userVerification->token = Uuid::generate(1);
        $user->userVerification->save();
        $user->email = $request->get('email');
        $user->verification = 0;
        $user->save();

        Mail::to($user->email)->send(new VerificationEmail([
            'user_id' => (string)$user->user_id,
            'username' => $user->username,
            'name' => $user->name,
            'email' => $user->email,
            'token' => (string)$user->userVerification->token
        ]));

        app('db')->table('sessions')
            ->where('user_id', $user->user_id)->delete();

        session(['message' => 'email修改成功']);

        return response()->json([
            'redirect' => '/signIn',
            'errors' => []
        ]);
    }
}
