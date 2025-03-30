
<div class="w-md mx-auto p-4 bg-slate-100 text-black rounded shadow-sm border border-slate-200 mb-4 flex flex-col space-y-2">
    <h2 class=" text-2xl font-bold">{{$task->title}}</h2>
    <p class=" text-sm text-slate-500 font-medium">{{$task->description}}</p>
    <img src="{{asset('storage/' . $task->image_path) }}" alt="Task Image" class="w-32 h-32 rounded">
</div> 