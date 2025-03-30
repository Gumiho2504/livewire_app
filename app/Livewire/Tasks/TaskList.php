<?php

namespace App\Livewire\Tasks;

use App\Livewire\Forms\TaskForm;
use App\Models\Task;
use Illuminate\Support\Facades\DB;
use Livewire\Attributes\Computed;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithPagination;

class TaskList extends Component
{
 
    use WithPagination;


   

    public function placeholder()
    {
        return view("components.skeleton");
    }

    #[Computed()]
    public function tasks(){
        return auth()->user()->tasks()->latest()->paginate(5);
    }


    #[Computed(persist:true)]
    public function tasksByStatus(){
        return auth()->user()->tasks()->select('status',DB::raw('COUNT(*) as count'))->orderBy('status','desc')
        ->groupBy('status')->get();
    }


    #[On("create-tasks")] // Listens for the "creat-tasks" event
    public function taskCreate(){
        unset($this->tasksByStatus);
    }

   

    public function render()
    {
       
        return view('livewire.tasks.task-list')->with(
            [
                //'tasks' => Auth::user()->tasks()->latest()->paginate(4),
                // 'taskByStatus' => Auth::user()->tasks()->select('status',DB::raw('COUNT(*) as count'))
                // ->orderBy('status','desc')
                // ->groupBy('status')->get(),
            ]
        );
    }

    public function changeStatus(Task $task, string $status)
    {
        
        $task->update(['status' => $status]);
        $this->dispatch("create-tasks");
    }

    public function deleted(Task $task)
    {
        
        $task->delete();
        $this->dispatch("create-tasks");
        
    }


    public function showTask($task){
        return redirect()->route('tasks.show', $task);
    }
}
