<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SchoolProfile extends Model
{
    protected $fillable = [
        'user_id',
        'school_name',
        'street',
        'street_number',
        'postal_code',
        'city',
        'country',
        'class_name',
        'supervisor_name',
        'supervisor_phone',
        'supervisor_email'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}