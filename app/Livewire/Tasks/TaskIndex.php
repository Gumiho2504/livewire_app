<?php
namespace App\Livewire\Tasks;

use App\Livewire\Forms\TaskForm;
use App\Models\Task;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;


class TaskIndex extends Component
{
    public TaskForm $form;
    public $tasks = [];


    

    public function mount()
    {
        try{
            $this->tasks = Auth::user()->tasks()->get();
        }catch (\Exception $e){
            request()->session()->flash('error', 'Something went wrong while creating the task.');
        }

    }




   

    public function render()
    {
        return view('livewire.tasks.task-index')->layout('layouts.app');
    }
}
