<div>
    <input type="text" name="" id="" class="border-2 {{$todo == null ? 'border-red-400' : ' border-gray-300'}}" wire:model="todo">

    <button wire:click="addTodo" class="p-2 bg-blue-400 text-white">Add</button>
    @forelse ($todos as  $todo)
        <div>{{ $todo }}</div>
    @empty
        <div>No Tasks</div>
    @endforelse
</div>
