<?php

namespace App\Http\Controllers;

use App\Http\Requests\ForgetPasswordPost;
use App\Http\Requests\ResetPasswordPost;
use App\Mail\ResetPasswordEmail;
use App\Model\PasswordReset;
use App\Model\User;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use Webpatser\Uuid\Uuid;

class ResetPasswordController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest', ['except' => ['get', 'reset']]);
    }

    protected function compareToken($token1, $token2)
    {
        return ($token1 === $token2) ? true : false;
    }

    protected function checkExpiredTime(Carbon $time1, Carbon $time2)
    {
        return ($time1->diffInMinutes($time2) > config('app.email_expired_time')) ? true : false;
    }

    /**
     * 顯示忘記密碼畫面
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('auth.forgetPassword');
    }

    /**
     * 寄送有重設密碼連結的信件
     *
     * @param ForgetPasswordPost $request
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function sendResetPasswordEmail(ForgetPasswordPost $request)
    {
        $email = $request->get('email');
        $user = User::where('email', $email)->first();

        $new_token = Uuid::generate(1);

        if (isset($user->passwordReset)) {
            $user->passwordReset->token = $new_token;
            $user->passwordReset->save();
        } else {
            PasswordReset::create([
                'password_reset_id' => Uuid::generate(4),
                'user_id' => $user->user_id,
                'token' => $new_token
            ]);
        }

        Mail::to($email)->send(new ResetPasswordEmail([
            'user_id' => (string)$user->user_id,
            'username' => $user->username,
            'name' => $user->name,
            'email' => $user->email,
            'token' => (string)$new_token
        ]));

        session(['message' => '已經寄送重設密碼的信件至' . $user->email]);

        return response()->json([
            'redirect' => '/forgetPassword'
        ]);
    }

    /**
     * 接收重設密碼信
     *
     * @param $user_id
     * @param $token
     * @return \Illuminate\Http\Response
     */
    public function get($user_id, $token)
    {
        $reset = PasswordReset::where('user_id', $user_id)->first();

        if (!isset($reset)) {
            return view('auth.resetPassword')
                ->with([
                    'status' => 1,
                    'message' => '驗證失敗，因為user_id不正確'
                ]);
        }

        if (!$this->compareToken($token, $reset->token)) {
            return view('auth.resetPassword')
                ->with([
                    'status' => 2,
                    'message' => '驗證失敗，因為token不正確'
                ]);
        }

        $now = Carbon::now();

        if ($this->checkExpiredTime($now, $reset->updated_at)) {
            return view('auth.resetPassword')
                ->with([
                    'status' => 3,
                    'message' => '驗證失敗，因為該信件連結已經逾時，請重新寄送一次'
                ]);
        }

        return view('auth.resetPassword')
            ->with([
                'status' => 0,
                'name' => $reset->user->name,
                'username' => $reset->user->username,
                'email' => $reset->user->email,
                'token' => $token,
                'message' => '請在下方輸入您的新密碼'
            ]);
    }

    /**
     * 重設密碼
     *
     * @param ResetPasswordPost $request
     * @return \Illuminate\Http\Response
     */
    public function reset(ResetPasswordPost $request)
    {
        $user = $request->getUser();

        if ($user == null) {
            return response()->json([
                'errors' => [
                    'token' => trans('validation.token')
                ]
            ], 422);
        }

        $user->password = Hash::make($request->get('password'));
        $user->save();

        app('db')->table('sessions')
            ->where('user_id', $user->user_id)->delete();

        Session::flash('message', '密碼重新設定成功');

        return response()->json([
            'redirect' => '/signIn',
            'errors' => []
        ]);
    }
}
