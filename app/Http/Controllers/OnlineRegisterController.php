<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterKeynotePost;
use App\Model\Registration;
use Illuminate\Http\Request;
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

        for ($i = 1; $i <= 11; $i++) {
            if (isset($keynote[$i])) {
                Registration::updateOrCreate([
                    'keynote_id' => $i,
                    'user_id' => (string)$user->user_id,
                ], [
                    'food' => isset($keynote[$i]['food']) ? $keynote[$i]['food'] : null
                ]);
            } else {
                Registration::where(
                    ['keynote_id' => $i, 'user_id' => (string)$user->user_id])->delete();
            }
        }

        session(['message' => '報名成功！']);
        return response()->json(['redirect' => '/registration/onlineRegister']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('registration.result');
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
