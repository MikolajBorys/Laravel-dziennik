<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DailyEntry extends Model
{
    protected $fillable = [
        'user_id',
        'entry_date',
        'time_from',
        'time_to',
        'tasks',
        'notes'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}