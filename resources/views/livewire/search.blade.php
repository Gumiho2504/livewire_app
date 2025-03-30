<div class="relative w-96 max-w-lg px-1 pt-1">
    <input wire:model.live.debounce.200ms="search" type="text"
        class="block w-full flex-1 py-2 px-3 mt-2 outline-none border-none rounded-md bg-slate-100"
        placeholder="Start Typing..." />
    <div class="absolute mt-2 w-full overflow-hidden rounded-md bg-white">
        @foreach ($results as $task)
        <div class="cursor-pointer py-2 px-3 hover:bg-slate-100">
            <a href="{{route('tasks.show',$task)}}" class="text-sm font-medium text-gray-600">{{$task->title}}</a>
            <p class="text-sm text-gray-500">{{$task->description}}</p>
        </div>
        @endforeach 
        
       
    </div>
</div>
