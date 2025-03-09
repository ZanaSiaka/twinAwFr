<?php

namespace App\Http\Controllers;

use App\Http\Requests\AwardFormRequest;
use App\Models\Awards;
use App\Models\Chat;
use App\Models\Vote;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class ChatController extends Controller
{
    public function index(): View
    {
        $chats = Chat::orderBy('created_at', 'desc')->paginate(5);
        return view('chats/index', ['chats' => $chats]);
    }

    public function show($id): View
    {
        $chat = Chat::findOrFail($id);

        return view('chats/show',['chat' => $chat]);
    }
    public function edit($id): View
    {
        $chat = Chat::findOrFail($id);
        return view('chats/edit', ['chat' => $chat]);
    }

    public function update($id, Request $req)
    {
        $data = $req->validate([
            'est_visible' => 'nullable|boolean',
        ]);

        $data['est_visible'] = $req->has('est_visible'); // Si non coché, renverra false

        $chat = Chat::findOrFail($id);

        if ($data['est_visible']) {
            Chat::where('est_visible', true)->update(['est_visible' => false]);
        }

        $chat->update($data);

        return redirect()->route('admin.chat.show', ['id' => $chat->id]);
    }




    public function updateSpeed(Chat $award, Request $req)
    {
        foreach ($req->all() as $key => $value) {
            $award->update([
                $key => $value
            ]);
        }

        return [
            'isSuccess' => true,
            'data' => $req->all()
        ];
    }

}
