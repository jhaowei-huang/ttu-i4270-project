<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterKeynotePost;
use App\Model\Registration;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;

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

        for ($i = 1; $i <= 11; $i++) {
            if (isset($keynote[$i])) {
                Registration::updateOrCreate([
                    'keynote_id' => $i,
                    'user_id' => (string)$user->user_id,
                ], [
                    'food' => isset($keynote[$i]['food']) ? $food[$keynote[$i]['food']] : null
                ]);
            } else {
                Registration::where(
                    ['keynote_id' => $i, 'user_id' => (string)$user->user_id])->delete();
            }
        }

        session(['message' => '報名成功！']);
        return response()->json(['redirect' => '/registration/onlineRegister/result']);
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
