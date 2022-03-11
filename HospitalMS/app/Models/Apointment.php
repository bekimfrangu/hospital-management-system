<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Apointment extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'phone',
        'email',
        'doctor',
        'date',
        'message',
        'user_id',
        'status',
    ];
}
