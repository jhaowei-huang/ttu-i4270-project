<?php

namespace App\Http\Controllers;

use App\Http\Requests\ResendEmailPost;
use App\Mail\VerificationEmail;
use App\Model\UserVerification;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Webpatser\Uuid\Uuid;

class VerifyController extends Controller
{
    protected function compareToken($token1, $token2)
    {
        return ($token1 === $token2) ? true : false;
    }

    protected function checkExpiredTime(Carbon $time1, Carbon $time2)
    {
        return ($time1->diffInMinutes($time2) > config('app.email_expired_time')) ? true : false;
    }

    public function index()
    {
        return view('auth.userVerification');
    }

    public function get($user_id, $token)
    {
        $verification = UserVerification::where('user_id', $user_id)->first();

        if (!isset($verification)) {
            return view('auth.userVerificationResult')
                ->with([
                    'status' => 1,
                    'message' => '驗證失敗，因為user_id不正確'
                ]);
        }

        if (!$this->compareToken($token, $verification->token)) {
            return view('auth.userVerificationResult')
                ->with([
                    'status' => 2,
                    'message' => '驗證失敗，因為token不正確'
                ]);
        }

        $now = Carbon::now();

        if ($this->checkExpiredTime($now, $verification->updated_at)) {
            return view('auth.userVerificationResult')
                ->with([
                    'status' => 3,
                    'message' => '驗證失敗，因為該信件連結已經逾時，請重新寄送一次'
                ]);
        }

        $verification->user->verification = 1;
        $verification->user->save();

        return view('auth.userVerificationResult')
            ->with([
                'status' => 0,
                'name' => $verification->user->name,
                'username' => $verification->user->username,
                'email' => $verification->user->email,
                'message' => '驗證成功'
            ]);
    }

    public function resend(ResendEmailPost $request)
    {
        $user = Auth::user();

        if ($user->verification == 1) {
            return response()->json([
                'redirect' => '/userVerification',
            ]);
        }

        $old_email = $user->email;
        $new_email = $request->get('email');

        // 更新token
        $user->userVerification->token = Uuid::generate(1);
        $user->userVerification->save();

        if ($old_email !== $new_email) {
            $user->email = $new_email;
            $user->save();
        }

        Mail::to($new_email)->send(new VerificationEmail([
            'user_id' => (string)$user->user_id,
            'username' => $user->username,
            'name' => $user->name,
            'email' => $user->email,
            'token' => (string)$user->userVerification->token
        ]));

        session(['message' => '已經重新寄送至' . $new_email]);

        return response()->json([
            'redirect' => '/userVerification',
        ]);
    }
}
