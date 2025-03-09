<?php

namespace App\Http\Controllers;

use App\Models\Award;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\AwardFormRequest;
use App\Models\Awards;
use Illuminate\Support\Facades\Storage;

class AwardController extends Controller
{
    public function index(): View
    {
        $awards = Awards::orderBy('created_at', 'desc')->paginate(5);
        return view('awards/index', ['awards' => $awards]);
    }

    public function show($id): View
    {
        $award = Awards::findOrFail($id);

        return view('awards/show',['award' => $award]);
    }
    public function create(): View
    {
        return view('awards/create');
    }

    public function edit($id): View
    {
        $award = Awards::findOrFail($id);
        return view('awards/edit', ['award' => $award]);
    }

    public function store(AwardFormRequest $req): RedirectResponse
    {
        $data = $req->validated();

            if ($req->hasFile('imageUrl')) {
        $data['imageUrl'] = $this->handleImageUpload($req->file('imageUrl'));
    }

        $award = Awards::create($data);
        return redirect()->route('admin.award.show', ['id' => $award->id]);
    }

    public function update(Awards $award, AwardFormRequest $req)
    {
        $data = $req->validated();

            if ($req->hasFile('imageUrl')) {
        // Suppression de l'ancienne image si elle existe
        if ($award->imageUrl) {
            Storage::disk('public')->delete($award->imageUrl);
        }
        $data['imageUrl'] = $this->handleImageUpload($req->file('imageUrl'));
    }

        $award->update($data);

        return redirect()->route('admin.award.show', ['id' => $award->id]);
    }

    public function updateSpeed(Awards $award, Request $req)
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

    public function delete(Awards $award)
    {
            if ($award->imageUrl) {
        Storage::disk('public')->delete($award->imageUrl);
    }
        $award->delete();

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