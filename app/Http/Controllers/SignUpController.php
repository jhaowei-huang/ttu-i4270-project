<?php

namespace App\Http\Controllers;

use App\Http\Requests\SignUpPost;
use App\Mail\VerificationEmail;
use App\Model\User;
use App\Model\UserVerification;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Webpatser\Uuid\Uuid;
use Illuminate\Http\Request;

class SignUpController extends Controller
{
    protected $redirectTo = '/';

    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * 顯示註冊畫面
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('auth.signUp');
    }

    /**
     * 註冊
     *
     * @param \App\Http\Requests\SignUpPost $request
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function signUp(SignUpPost $request)
    {
        // 註冊資料正確，寫入資料庫
        $this->create($request->all());
        // 登入憑證，使用帳號來登入
        $credentials = $request->credentials();
        // 嘗試登入
        if (Auth::attempt($credentials, false)) {
            $user = Auth::user();
            // 登入成功，寄送帳號驗證信件
            Mail::to($user->email)->send(new VerificationEmail([
                'user_id' => (string)$user->user_id,
                'username' => $user->username,
                'name' => $user->name,
                'email' => $user->email,
                'token' => (string)$user->userVerification->token
            ]));

            return response()->json([
                'redirect' => '/userVerification',
                'errors' => []
            ]);
        } else {
            // 登入失敗，回報憑證錯誤
            return response()->json([
                'redirect' => '',
                'errors' => [
                    'username' => trans('validation.signIn.username.error'),
                    'password' => trans('validation.signIn.password.error')
                ]
            ], 422);
        }
    }

    /**
     * 建立一個User的實體寫入資料庫
     *
     * @param array $data
     * @return \App\Model\User
     * @throws \Exception
     */
    protected function create(array $data)
    {
        $user_id = Uuid::generate(4);

        $user = User::create([
            'user_id' => $user_id,
            'username' => $data['username'],
            'password' => Hash::make($data['password']),
            'email' => $data['email'],
            'name' => $data['name'],
            'address' => $data['address'],
            'department' => $data['department'],
            'position' => $data['position'],
            'phone' => $data['phone'],
            'phone_ext' => $data['phone_ext'],
            'fax' => $data['fax'],
            'fax_ext' => $data['fax_ext']
        ]);

        UserVerification::create([
            'user_verification_id' => Uuid::generate(4),
            'user_id' => $user_id,
            'token' => Uuid::generate(1)
        ]);

        return $user;
    }
}
