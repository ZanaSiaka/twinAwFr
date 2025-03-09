<?php

namespace App\Http\Controllers;


use App\Models\Vote;
use Illuminate\Http\Request;
use Illuminate\View\View;

class VoteController extends Controller
{
    //
    public function index(): View
    {
        $votes = Vote::orderBy('created_at', 'desc')->paginate(5);
        return view('votes/index', ['votes' => $votes]);
    }
}
