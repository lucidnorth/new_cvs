<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TalkToUs extends Model
{
    use HasFactory;
    
    protected $table = 'talktous';

    protected $fillable = ['name', 'email', 'recipient', 'subject', 'message'];
}
