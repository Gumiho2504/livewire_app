<?php

namespace App\Livewire\Auth;

use Livewire\Component;

class Navigation extends Component
{
    public $name ="Hem chanmetrey";
    public function render()
    {
        return view('livewire.auth.navigation')->with('name', $this->name);
    }
}
