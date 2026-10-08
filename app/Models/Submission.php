<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Submission extends Model
{
    protected $fillable = [
        'full_name', 'profession', 'organization', 'city', 'email',
        'phone', 'story', 'proof_link', 'photo', 'status', 'admin_note',
    ];
}