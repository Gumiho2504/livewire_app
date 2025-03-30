<?php

namespace App\Livewire;

use Livewire\Component;

class Tasks extends Component
{
    public $todos = [];
    public $todo = "";


    public function render()
    {
        return view('livewire.tasks');
    }

    public function mount()
    {
        $this->todos = ['Task 1', 'Task 2', 'Task 3'];
    }

    public function addTodo()
    {
        $this->todos[] = $this->todo;
        $this->todo = "";
    }
}
