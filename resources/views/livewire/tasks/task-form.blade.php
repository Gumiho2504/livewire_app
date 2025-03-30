<div class="w-full p-4 bg-slate-200 rounded-lg sm:w-1/3">
    <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100 mb-4">Create Task</h2>
    <h2>{{$form->title}}</h2>
    @if (session('success'))
        <div class="p-3 bg-green-100 text-green-800 rounded shadow-sm  border-green-800 border-l-4" role="alert">
            <span class=" text-sm text-green-600"> {{ session('success') }}</span>

        </div>

    @endif
    @if (session('error'))
        <div class="p-3  bg-green-100 text-red-800 rounded shadow-sm  border-red-800 border-l-4" role="alert">
            <span class=" text-sm text-red-600"> {{ session('message') }}</span>

        </div>
    @endif
    <form action="" wire:submit="save">
        {{-- @csrf/
        @method('POST') --}}

        <!-- Title field -->
        <div class="w-full mb-4">
            <label for="title" class="block mb-2 text-sm font-medium text-grey-900">Title</label>
            <input type="text" name="title" id="title" wire:model.live="form.title" value="{{ old('title') }}"
                placeholder="Enter title"
                class="w-full bg-gray-50 border-dashed border-gray-800 rounded-lg text-sm focus:ring-blue-500">
            @error('form.title')
                <span class="text-sm text-red-700">{{ $message }}</span>
            @enderror
        </div>

        <!-- Description field -->
        <div class="w-full mb-4">
            <label for="description" class="block mb-2 text-sm font-medium text-grey-900">Description</label>
            <input type="text" name="description" id="description" wire:model="form.description"
                class="w-full bg-gray-50 border-dashed border-gray-800 rounded-lg text-sm focus:ring-blue-500">
            @error('form.description')
                <span class="text-sm text-red-700">{{ $message }}</span>
            @enderror
        </div>
        <!-- Slug field -->
        <div class="w-full mb-4">
            <label for="slug" class="block mb-2 text-sm font-medium text-grey-900">Slug</label>
            <input type="text" name="slug" id="slug" wire:model="form.slug"
                class="w-full bg-gray-50 border-dashed border-gray-800 rounded-lg text-sm focus:ring-blue-500">
            @error('form.slug')
                <span class="text-sm text-red-700">{{ $message }}</span>
            @enderror
        </div>


        <!-- Status field -->
        <div class="w-50 mb-4">
            <label for="status" class="block mb-2 text-sm font-medium text-grey-900">Status</label>
            <select name="status" id="status" wire:model="form.status"
                class="bg-gray-50 border-dashed border-gray-800 rounded-lg text-sm focus:ring-blue-500">
                <option value="none">Select status</option>
                @foreach (App\StatusType::cases() as $status)
                    <option value="{{ $status->value }}">{{ $status->name }}</option>
                @endforeach
            </select>
            @error('form.status')
                <span class="text-sm text-red-700">{{ $message }}</span>
            @enderror
        </div>

        <!-- Priority field -->
        <div class="w-50 mb-4">
            <label for="priority" class="block mb-2 text-sm font-medium text-grey-900">Priority</label>
            <select name="priority" id="priority" wire:model="form.priority"
                class="bg-gray-50 border-dashed border-gray-800 rounded-lg text-sm focus:ring-blue-500">
                <option value="none">Select priority</option>
                @foreach (App\PriorityType::cases() as $status)
                    <option value="{{ $status->value }}">{{ $status->name }}</option>
                @endforeach
            </select>
            @error('form.priority')
                <span class="text-sm text-red-700">{{ $message }}</span>
            @enderror
        </div>

        <!-- Deadline field -->
        <div class="w-full mb-4">
            <label for="deadline" class="block mb-2 text-sm font-medium text-grey-900">Deadline</label>
            <input type="date" name="deadline" id="deadline" wire:model="form.deadline"
                class="w-full bg-gray-50 border-dashed border-gray-800 rounded-lg text-sm focus:ring-blue-500">

            @error('form.deadline')
                <span class="text-sm text-red-700">{{ $message }}</span>
            @enderror
        </div>



        <div>
            <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="multiple_files">
                Task Image</label>
            <input
                class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" type="file"  wire:model="form.photo">
            @error('form.photo')
                <span class="text-sm text-red-700">{{ $message }}</span>
            @enderror
        </div>


        <!-- Submit button -->
        <button type="submit" class="px-3 py-2 bg-blue-500 text-white rounded-sm" wire:click="save">
            <span wire:loading.remove wire:target="save">
                Save
            </span>
            <span wire:loading wire:target="save">
                Saving...
            </span>
        </button>

    </form>
</div>
