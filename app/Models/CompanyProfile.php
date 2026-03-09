<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CompanyProfile extends Model
{
    protected $fillable = [
        'user_id',
        'company_name',
        'nip',
        'street',
        'street_number',
        'postal_code',
        'city',
        'country',
        'supervisor_name',
        'supervisor_role',
        'supervisor_phone',
        'supervisor_email'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}