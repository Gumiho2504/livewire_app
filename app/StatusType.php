<?php

namespace App;

enum StatusType : string
{
    case Started = 'started';
    case InProgress = 'in_progress';
    case Completed = 'completed';

    public function color (): string
    {
        return match ($this) {
            self::Started => 'bg-sky-200 text-sky-800 border-sky-800',
            self::InProgress => 'bg-amber-300 border-amber-500 text-amber-500',
            self::Completed => 'bg-green-100 text-green-800 border-green-800',
        };
    }
}
