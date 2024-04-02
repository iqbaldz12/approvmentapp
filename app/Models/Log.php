<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Log extends Model
{
    use HasFactory,  HasUuids;

    protected $table = 'logs';
    protected $primaryKey = 'id';

    protected $fillable = [
        'approvement_id',
        'approved_by_id' ,
        'task_id',
        'user_id',
        'action',
        'step',
        'status',
        'notes',
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
