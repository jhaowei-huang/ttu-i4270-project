<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function index()
    {
        return view('pages.index');
    }

    public function agenda0926()
    {
        return view('pages.agenda0926');
    }

    public function agenda0927()
    {
        return view('pages.agenda0927');
    }

    public function map()
    {
        return view('pages.map');
    }

    public function speaker()
    {
        return view('pages.speaker');
    }

    public function registration()
    {
        return view('pages.registration');
    }

    public function contact()
    {
        return view('pages.contact');
    }
}
