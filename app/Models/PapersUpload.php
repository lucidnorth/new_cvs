<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PapersUpload extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'papersuploads';

    protected $fillable = [
        'name',
        'category',
        'description',
        'file',
        'image_path', // Ensure this matches the column name in your database
        'user_id',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    /**
     * Get the user that owns the paper.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
