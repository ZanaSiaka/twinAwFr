<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Award;

class Welcome extends Controller
{
    //
    public function index()
    {
        //

        $awards = Award::limit(6)->get();

        return view('welcome', compact('awards'));
    }

    public function a_propos()
    {
        return view('propos');
    }
}
