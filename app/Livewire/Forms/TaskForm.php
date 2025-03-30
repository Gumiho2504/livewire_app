<?php

namespace App\Livewire\Forms;

use App\Models\Task;
use Illuminate\Support\Facades\Auth;
use Livewire\Form;
use Livewire\Attributes\Rule;

use Livewire\Attributes\Validate;
use Livewire\WithFileUploads;

class TaskForm extends Form
{

    use  WithFileUploads;

    public ?Task $task;

    #[Rule('required', 'string', 'max:255', 'min:3')]
    public $title;

    #[Rule('required', 'string', 'max:255')]
    public $slug;

    #[Rule('required', 'string', 'max:255')]
    public $description;

    #[Rule('required')]
    public $priority;

    #[Rule('required')]
    public $status;

    #[Rule('required')]
    public $deadline;

    //#[Rule('image|max:1024')]
    public $photo;

    public bool $isUpdate = false;






    public function setTask($task)
    {
        $this->task = $task;
        $this->title = $task->title;
        $this->description = $task->description;
        $this->slug = $task->slug;
        $this->status = $task->status;
        $this->priority = $task->priority;
        $this->deadline = $task->deadline->format("Y-m-d");
        $this->isUpdate = true;
       
    }


    public function createTask()
    {

        $this->validate();
        if ($this->photo) {
            $path = $this->photo->store('taks_images', 'public');
        } else {
            $path = null;
        }
        if($this->isUpdate){
            $this->task->update([
                'title' => $this->title,
                'slug' => $this->slug,
                'description' => $this->description,
                'priority' => $this->priority,
                'status' => $this->status,
                'deadline' => $this->deadline,
                'image_path' => $path,
            ]);
            request()->session()->flash('success', 'Task update successfully!');
        }else{
            Auth::user()->tasks()->create([
                'title' => $this->title,
                'slug' => $this->slug,
                'description' => $this->description,
                'priority' => $this->priority,
                'status' => $this->status,
                'deadline' => $this->deadline,
                'image_path' => $path,
            ]);
            request()->session()->flash('success', 'Task created successfully!');
        }
        
    }
}
