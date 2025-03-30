<div class=" flex flex-row justify-around p-3 bg-slate-100 text-black rounded shadow-sm  border border-slate-200 mb-4">
    @php
        $total = Auth::user()->tasks()->count();
    @endphp

    <div class="flex flex-col space-y-2 justify-center items-center">
        <span>Total</span>
        <span @class([
            'w-16 h-16 border-2 rounded-full flex justify-center items-center border-purple-500',
        ])>
            {{ $total }}
        </span>
    </div>


    @foreach ($taskByStatus as $status)
        <div class="flex flex-col space-y-2 justify-center items-center">
            <span>{{ Str::of($status->status->value)->headline() }}</span>
            <span @class([
                'w-16 h-16 border-2 rounded-full flex justify-center items-center',
                $status->status->color() => $status,
            ])>
                {{ $status->count }}
            </span>

        </div>
    @endforeach

</div>
