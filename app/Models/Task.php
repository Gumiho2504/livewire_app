<?php

namespace App\Models;

use App\PriorityType;
use App\StatusType;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Task extends Model
{
    /** @use HasFactory<\Database\Factories\TaskFactory> */
    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
        'description',
        'status',
        'priority',
        'deadline',
        'image_path',
    ];


    protected $casts = [
        'deadline' => 'datetime',
        'status' => StatusType::class,
        'priority' => PriorityType::class,
    ];

    public function user():BelongsTo{
        return $this->belongsTo(User::class);
    }
}
