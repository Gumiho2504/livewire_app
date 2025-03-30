<?php

namespace App\Livewire\Images;

use App\Models\Image;
use Illuminate\Support\Facades\Storage;
use Livewire\Attributes\Rule;
use Livewire\Component;
use Livewire\WithFileUploads;

class ImageIndex extends Component
{
    use WithFileUploads;

    #[Rule('image|max:1024')]
    public $photo;

    public function save(){
        $this->validate();
        $name = $this->photo->getClientOriginalName();
        $path = $this->photo->storeAs('profile',$name,'public');
        if(auth()->user()->image()){
            Storage::delete(auth()->user()->image->path);
        }
        auth()->user()->image()->create([
            'name' => $name,
            'path' => $path
        ]);
        $this->reset();
    }
    public function render()
    {
        return view('livewire.images.image-index')->layout('layouts.app');
    }
}
