<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Approvement extends Model
{
    use HasFactory, HasUuids;

    protected $fillable = [
        'task_id',
        'approved_by_id',
        'step',
        'status',
        'notes'
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class,'approved_by_id' );
    }

    public function approvement(): HasMany
    {
        return $this->HasMany(approvement::class);
    }
}
