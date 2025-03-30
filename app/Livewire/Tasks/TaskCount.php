<?php

namespace App\Livewire\Tasks;

use Livewire\Attributes\Reactive;
use Livewire\Component;

class TaskCount extends Component
{
    #[Reactive]
    public $taskByStatus;
    
    public function render()
    {
        return view('livewire.tasks.task-count',[
            'taskByStatus' => $this->taskByStatus
        ]);
    }
}
