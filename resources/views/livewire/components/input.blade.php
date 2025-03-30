<div class="w-full mb-4">
    <label for="{{ $name }}" class="block mb-2 text-sm font-medium text-grey-900">
        {{ Illuminate\Support\Str::ucfirst($name) }}
    </label>

    <input
        type="text"
        name="{{ $name }}"
        id="{{ $name }}"
        wire:model="{{ $name }}"
        class="w-full bg-gray-50 border-dashed border-gray-800 rounded-lg text-sm focus:ring-blue-500"
    >

    @error($name)
        <span class="text-sm text-red-700">{{ $message }}</span>
    @enderror
</div>
