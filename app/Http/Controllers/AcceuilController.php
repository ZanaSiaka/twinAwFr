<?php

namespace App\Http\Controllers;

use App\Models\Awards;
use App\Models\Chat;
use App\Models\Nomine;
use App\Models\Vote;
use Illuminate\Http\Request;

class AcceuilController extends Controller
{
    //
    public function index(){
        $awards = Awards::limit(6)->get();
        return view('welcome', compact('awards'));
    }

    public function awards(){
        $awards = Awards::all();
        return view('categorie', compact('awards'));
    }

    public function nomines(Request $request)
    {
        $category = $request->input('category'); // Récupère la catégorie depuis la requête

        // Si une catégorie est sélectionnée, filtrer les nominés
        if ($category) {
            $nomines = Nomine::whereHas('award', function ($query) use ($category) {
                $query->where('nom', $category);
            })->get();
        } else {
            // Si aucune catégorie n'est sélectionnée, récupérer tous les nominés
            $nomines = Nomine::all();
        }

        // Récupérer tous les awards pour l'affichage des catégories
        $awards = Awards::all();

        return view('nomine', compact('nomines', 'awards'));
    }

    public function voter($id)
    {
        // Vérifier si l'utilisateur est authentifié
        if (!auth()->check()) {
            return redirect()->route('authenticate')->with('error', 'Vous devez être connecté pour voter');
        }

        // Récupérer le nominé par son id
        $nomine = Nomine::findOrFail($id);

        // Vérifier si le nominé est déjà lié à un autre award
        $existingAward = $nomine->award; // Récupère le "award" auquel ce nominé est lié

        if ($existingAward) {
            // Vérifier si l'utilisateur a déjà voté dans cet award
            $existingVote = Vote::where('nomine_id', $nomine->id)
                ->where('user_id', auth()->id())
                ->where('award_id', $existingAward->id)
                ->first();

            if ($existingVote) {
                return back()->with('error', 'Vous avez déjà voté pour ce nominé dans cet award');
            }
        }

        // Vérifier si l'utilisateur a déjà voté pour ce nominé
        $existingVote = Vote::where('nomine_id', $nomine->id)
            ->where('user_id', auth()->id())
            ->first();

        // Si l'utilisateur a déjà voté, on renvoie un message
        if ($existingVote) {
            return back()->with('error', 'Vous avez déjà voté pour ce nominé');
        }

        // Enregistrer le vote
        Vote::create([
            'nomine_id' => $nomine->id,
            'user_id' => auth()->id(),
            'award_id' => $existingAward->id, // On associe le vote au même "award"
        ]);

        // Retourner à la page précédente avec un message de succès
        return back()->with('success', 'Votre vote a été pris en compte');
    }


    public function chatBox()
    {
        $chat = Chat::select('*')->where('est_visible', '=', true)->get();
        return view('chat', compact('chat'));
    }

    public function storeChat(Request $request)
    {
        // Valider les données du formulaire
        $validated = $request->validate([
            'question' => 'required|string|max:255',
        ]);

        // Créer une nouvelle question
        $chat = Chat::create([
            'question' => $validated['question'],
        ]);

        // Retourner une réponse
        return redirect()->back()->with('success', 'Question posée avec succès!');
    }




}
