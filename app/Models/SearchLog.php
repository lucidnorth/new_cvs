<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SearchLog extends Model
{
    use HasFactory;

    // Define the table associated with the model
    protected $table = 'search_logs';

    // Define the fillable attributes for mass assignment
    protected $fillable = [
        'user_id',
        'search_term',
    ];

    // Define any relationships or custom methods here
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function certificate()
    {
        return $this->hasOne(Certificate::class, 'certificate_number', 'search_term');
    }
}
