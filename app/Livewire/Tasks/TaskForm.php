<?php

namespace App\Livewire\Tasks;

use App\Livewire\Forms\TaskForm as FormsTaskForm;
use App\Models\Task;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithFileUploads;

class TaskForm extends Component
{ 
    use  WithFileUploads;


    public FormsTaskForm $form;

   

   

    

    #[On('task-edit')]
    public function taskEdit($id){
       $task = Task::findOrFail($id);
       $this->form->setTask($task);

    }

    public function save()
    {
        
        
        $this->form->createTask();
        $this->dispatch("create-tasks");
        
        $this->form->reset();
    }

    public function render()
    {
        return view('livewire.tasks.task-form');
    }
}
