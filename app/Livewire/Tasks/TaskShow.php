<?php

namespace App\Livewire\Tasks;

use App\Models\Task;
use Livewire\Attributes\Reactive;
use Livewire\Component;

class TaskShow extends Component
{
    
    public $task;
    public function mount($task)
    {

        $this->task = Task::findOrFail($task);
    }
    public function render()
    {
        return view('livewire.tasks.task-show')->layout('layouts.app');
    }
}
