<?php

namespace App\Http\Controllers;

use App\Http\Requests\SignInPost;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SignInController extends Controller
{
    protected $redirectTo = '/';

    public function __construct()
    {
        $this->middleware('guest')->except('signOut');
    }

    /**
     * 顯示登入畫面
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('auth.signIn');
    }

    /**
     * 登入
     *
     * @param SignInPost $request
     * @return \Illuminate\Http\Response
     */
    public function signIn(SignInPost $request)
    {
        // 登入憑證，使用帳號或是email來登入
        $credentials = $request->credentials();
        // 是否有勾選'在此裝置記住我'
        $remember = $request->has('remember') ? true : false;
        // 嘗試登入
        if (Auth::attempt($credentials, $remember)) {
            // 登入成功
            session(['message' => '登入成功']);

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
     * 登出
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function signOut(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        return redirect($this->redirectTo);
    }
}
