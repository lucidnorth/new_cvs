<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CustomerCare extends Model
{
    use HasFactory;

    protected $fillable = [
        'issue',
        'name',
        'email',
        'phone',
        'message',
    ];
}
