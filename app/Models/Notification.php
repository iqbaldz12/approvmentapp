<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    use HasFactory, HasUuids;

    protected $fillable = [
        'from_id',
        'to_id',
        'title',
        'messege'
    ];


    public function fromuser(): BelongsTo
    {
        return $this->belongsTo(User::class, 'from_id');
    }

    public function touser(): BelongsTo
    {
        return $this->belongsTo(User::class, 'to_id');
    }
}
