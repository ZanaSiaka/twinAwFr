<?php

namespace App\Http\Controllers;

use App\Models\Nomine;
use Illuminate\Http\Request;

class NomineController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $nomines = Nomine::orderBy('created_at', 'desc')->paginate(5);
        return view('nomines/index', ['nomines' => $nomines]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $awards = \App\Models\Awards::all();  // Récupérer tous les awards
        $users = \App\Models\User::all();    // Récupérer tous les utilisateurs

        return view('nomines/create', compact('awards', 'users'));

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $validated = $request->validate([
            'award_id' => 'required|exists:awards,id',
            'user_id' => 'required|exists:users,id',
        ]);

        // Créer un nouveau nominé
        $nomine = Nomine::create([
            'award_id' => $request->award_id,
            'user_id' => $request->user_id,
        ]);

        return redirect()->route('admin.nomine.show', ['id' => $nomine->id]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $nomine = Nomine::findOrFail($id);

        return view('nomines/show',['nomine' => $nomine]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $nomine = Nomine::findOrFail($id);
        return view('nomines/edit', ['nomine' => $nomine]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Nomine $nomine)
    {
        //
        $validated = $request->validate([
            'award_id' => 'required|exists:awards,id',
            'user_id' => 'required|exists:users,id',
        ]);

        // Créer un nouveau nominé
        $nomine->update([
            'award_id' => $request->award_id,
            'user_id' => $request->user_id,
        ]);

        return redirect()->route('admin.nomine.show', ['id' => $nomine->id]);
    }


    public function updateSpeed(Nomine $nomine, Request $req)
    {
        foreach ($req->all() as $key => $value) {
            $nomine->update([
                $key => $value
            ]);
        }

        return [
            'isSuccess' => true,
            'data' => $req->all()
        ];
    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete(Nomine $nomine)
    {

        $nomine->delete();

        return [
            'isSuccess' => true
        ];
    }
}
