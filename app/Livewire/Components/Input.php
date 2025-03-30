<?php

namespace App\Livewire\Components;

use Livewire\Component;

class Input extends Component
{
    public string $name;
    public function mount($name)
    {
        $this->name = $name; // Set the name property
    }
    public function render()
    {
        return view('livewire.components.input');
    }
}
