<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\UserFormRequest;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\LoginFormRequest;
use App\Models\Awards;
use Illuminate\Support\Facades\Auth;
use App\Models\Role;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    // Recuperer tous les awards
    public function nominer (){
        $awards = Awards::all();
        return view ('nomine' , ['awards' => $awards]);
    }
    public function authenticate()
    {
        // vérifie s'il est authentifier et redirige
        if (auth()->check()) {
            return to_route('welcome');
        }else if(auth()->check() && auth()->isAdmin()){
            return to_route('admin.award.index');
        }
        return view('authenticate');
    }
    public function authenticateSave(LoginFormRequest $request)
    {
        $data = $request->validated();

        if (Auth::attempt(['matricule' => $data['matricule'], 'password' => $data['password']])) {
            if (auth()->user() && auth()->user()->isAdmin()) {
                return to_route('admin.award.index');
            } else {
                return to_route('welcome');
            }
        } else {
            return to_route('authenticate')
                ->withInput();
        }
    }
    // Pour la déconnexion
    public function logout()
    {
        Auth::logout();
        return to_route('welcome');
    }
    public function index(): View
    {
        $users = User::orderBy('created_at', 'desc')->paginate(5);
        return view('users/index', ['users' => $users]);
    }

    public function show($id): View
    {
        $user = User::findOrFail($id);

        return view('users/show', ['user' => $user]);
    }
    public function create(): View
    {
        $roles = Role::all();
        return view('users/create', ['roles' => $roles]);
    }

    public function edit($id): View
    {
        $roles = Role::all();
        $user = User::findOrFail($id);
        return view('users/edit', ['user' => $user, 'roles' => $roles]);
    }

    public function store(UserFormRequest $req): RedirectResponse
    {
        $roles = $req->validated('roles');
        $data = $req->validated();


        if ($req->hasFile('imageUrl')) {
            $data['imageUrl'] = $this->handleImageUpload($req->file('imageUrl'));
        }
        $data['password'] = bcrypt($data['password']);

        $user = User::create($data);

        $user->roles()->sync($roles);

        return redirect()->route('admin.user.show', ['id' => $user->id]);
    }

    public function update(User $user, UserFormRequest $req)
    {
        $data = $req->validated();
        $roles = $req->validated('roles');

        if ($req->hasFile('imageUrl')) {
            // Suppression de l'ancienne image si elle existe
            if ($user->imageUrl) {
                Storage::disk('public')->delete($user->imageUrl);
            }
            $data['imageUrl'] = $this->handleImageUpload($req->file('imageUrl'));
        }

        $data['password'] = bcrypt($data['password']);
        $user->update($data);

        $user->roles()->sync($roles);

        return redirect()->route('admin.user.show', ['id' => $user->id]);
    }

    public function updateSpeed(User $user, Request $req)
    {
        foreach ($req->all() as $key => $value) {
            $user->update([
                $key => $value
            ]);
        }

        return [
            'isSuccess' => true,
            'data' => $req->all()
        ];
    }

    public function delete(User $user)
    {
        if ($user->imageUrl) {
            Storage::disk('public')->delete($user->imageUrl);
        }
        $user->delete();

        return [
            'isSuccess' => true
        ];
    }

    private function handleImageUpload(\Illuminate\Http\UploadedFile|array $images): string|array
    {
        if (is_array($images)) {
            $uploadedImages = [];
            foreach ($images as $image) {
                $imageName = uniqid() . '_' . $image->getClientOriginalName();
                $image->storeAs('images', $imageName, 'public');
                $uploadedImages[] = 'images/' . $imageName;
            }
            return $uploadedImages;
        } else {
            $imageName = uniqid() . '_' . $images->getClientOriginalName();
            $images->storeAs('images', $imageName, 'public');
            return 'images/' . $imageName;
        }
    }
}
