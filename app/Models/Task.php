<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory, HasUuids;

    protected $fillable = [
        'tasks_name',
        'description',
        'file',
        'user_id'
    ];

    public function approvements(): HasMany
    {
        return $this->hasMany(Approvement::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
