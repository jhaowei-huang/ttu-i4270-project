<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterKeynotePost;
use App\Mail\RegistrationEmail;
use App\Model\Registration;
use App\Model\RegistrationCode;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use Webpatser\Uuid\Uuid;

class OnlineRegisterController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        $registrations = Registration::where('user_id', $user->user_id)
            ->orderBy('keynote_id', 'asc')->get();
        $keynotes = [];
        foreach ($registrations as $registration) {
            $keynote = $registration->keynote;
            array_push($keynotes, [
                'food' => isset($registration->food) ? $registration->food : '不提供',
                'index' => $registration->keynote_id,
            ]);
        }

        return view('registration.onlineRegister');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \App\Http\Requests\RegisterKeynotePost $request
     * @return \Illuminate\Http\Response
     */
    public function store(RegisterKeynotePost $request)
    {
        $user = Auth::user();
        $keynote = $request->get('keynote');
        $food = config('enums.food');
        $counts = 0;
        $json = ['user_id' => $user->user_id, 'keynotes' => []];
        $code = null;

        for ($i = 1; $i <= 11; $i++) {
            if (isset($keynote[$i])) {
                $record = Registration::updateOrCreate([
                    'keynote_id' => $i,
                    'user_id' => (string)$user->user_id,
                ], [
                    'food' => isset($keynote[$i]['food']) ? $food[$keynote[$i]['food']] : null
                ]);

                array_push($json['keynotes'], ['keynote_id' => $record->keynote_id, 'food' => $record->food]);
                $counts++;
            } else {
                Registration::where(['keynote_id' => $i, 'user_id' => (string)$user->user_id])->delete();
            }
        }

        if ($counts != 0) {
            $code = QrCode::format('svg')->encoding('UTF-8')->size(50)->generate(serialize($json));
            RegistrationCode::updateOrCreate([
                'user_id' => (string)$user->user_id,
            ], [
                'registration_code_id' => Uuid::generate(4),
                'data' => $code
            ]);
        } else {
            RegistrationCode::where(['user_id' => (string)$user->user_id])->delete();
        }

        Mail::to($user->email)->send(new RegistrationEmail([
            'user_id' => (string)$user->user_id,
            'username' => $user->username,
            'name' => $user->name,
            'email' => $user->email,
            'code' => (string)$code,
        ]));

        session([
            'message' => '報名成功，已寄送含有報名條碼的信件至您的信箱',
            'code' => $code
        ]);

        return response()->json([
            'redirect' => '/registration/onlineRegister/result',
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = Auth::user();
        $registrations = Registration::where('user_id', $user->user_id)
            ->orderBy('keynote_id', 'asc')->get();
        $keynotes = [];
        foreach ($registrations as $registration) {
            $keynote = $registration->keynote;
            array_push($keynotes, [
                'food' => isset($registration->food) ? $registration->food : '不提供',
                'index' => $registration->keynote_id,
                'date' => $keynote->date,
                'time' => $keynote->start_time . '~' . $keynote->end_time,
                'agenda' => $keynote->agenda,
                'speaker' => $keynote->speaker,
                'position' => $keynote->position,
            ]);
        }

        return view('registration.result', ['keynotes' => $keynotes]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
