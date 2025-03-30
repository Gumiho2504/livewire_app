<div class="w-full p-4 sm:w-1/2">

    <livewire:tasks.task-count :taskByStatus="$this->tasksByStatus" />
    @if (true)
        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100 mb-4 ">Tasks</h2>

        @forelse ($this->tasks as $task)
            <div
                class="p-3 bg-slate-100 text-black rounded shadow-sm  border border-slate-200 mb-4 flex flex-col space-y-2
        hover:scale-105 transition-transform duration-300 ease-in-out hover:bg-slate-300
        ">
                <div wire:click="showTask({{ $task->id }})">
                    <div class="flex flex-row justify-between">
                        <a href="{{ route('tasks.show', $task->id) }}">{{ $task->title }}</a>
                        <span class="text-xs text-yellow-800">{{ $task->created_at->diffForHumans() }}</span>
                    </div>

                    <p class=" text-xs text-slate-400">
                        {{ $task->description }}
                    </p>
                    <div class=" flex flex-row justify-items-start space-x-4">

                        <span class="text-xs
                    text-slate-400">Status: {{ $task->status }}</span>
                        <span class="text-xs text-slate-400">Priority: {{ $task->priority }}</span>

                        <span class="text-xs text-slate-400">Deadline: {{ $task->deadline->diffForHumans() }}</span>
                    </div>
                </div>

                <div class=" flex justify-between">
                    <div class="`flex flex-row justify-between space-x-2">
                        @foreach (App\StatusType::cases() as $status)
                            <button @class([
                                'px-3 py-1 rounded-md text-xs border',
                                $status->color() => true,
                                $task->status->value == $status->value ? 'line-through' : '',
                            ])
                                wire:click="changeStatus({{ $task->id }}, '{{ $status->value }}')"
                                @disabled($task->status->value == $status->value)>
                                {{ Str::headline($status->value) }}
                            </button>
                        @endforeach
                       
                    </div>
                    <div>
                        <button wire:click="$dispatch('task-edit',{id:{{$task->id}}})" class="px-3 py-1 bg-amber-500 text-white rounded-md text-xs">Edit</button>
                        <button wire:click="deleted({{ $task->id }})"
                            class="px-3 py-1 bg-red-500 text-white rounded-md text-xs">Delete</button>
                    </div>
                </div>

                

            </div>
        @empty
            <div>No tasks</div> <!-- Display message if no tasks -->
        @endforelse

        <div>
            {{ $this->tasks->links() }}
        </div>
    @endif
</div>
