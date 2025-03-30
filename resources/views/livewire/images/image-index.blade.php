<div>
    <div>Helo</div>
   <div class=" w-3/12 absolute right-0 m-4">
    <form action="" class=" flex flex-col space-y-2 p-3 border border-dashed border-3 rounded-sm bg-slate-200" wire:submit="save">
        <div>
            <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="multiple_files">Upload
                Profile Image</label>
            <input
                class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" type="file"  wire:model="photo">
            @error('photo')
                <span class="text-sm text-red-700">{{ $message }}</span>
            @enderror
            @if($photo)
               <img src="{{$photo->temporaryUrl()}}" alt="" class=" w-25 h-25 rounded-md">
            @endif
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

</div>
