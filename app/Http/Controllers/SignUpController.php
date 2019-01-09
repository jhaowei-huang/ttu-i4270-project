<?php

namespace App\Http\Controllers;

use App\Http\Requests\SignUpPost;
use Illuminate\Http\Request;

class SignUpController extends Controller
{
    protected $redirectTo = '/';

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
     */
    public function signUp(SignUpPost $request)
    {
        // 登入憑證，使用帳號或是email來登入
        $credentials = $request->credentials();
        // 是否有勾選'在此裝置記住我'
        $remember = $request->has('remember') ? true : false;
        // 嘗試登入
        if (Auth::attempt($credentials, $remember)) {
            // 登入成功
//            if (Auth::user()->email_verified == 0) {
//                // email還尚未驗證，要求跳轉至verifyUserEmail頁面
//                return response()->json([
//                    'redirect' => '/verifyUserEmail',
//                    'errors' => []
//                ]);
//            } else {
//                // email已經驗證，要求跳轉至首頁
//                return response()->json([
//                    'redirect' => '/',
//                    'errors' => []
//                ]);
//            }
            return response()->json([
                'redirect' => '/',
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
