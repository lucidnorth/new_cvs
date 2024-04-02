<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class PapersUpload extends Model
{
    use SoftDeletes, InteractsWithMedia,HasFactory;
    public $table = 'papersuploads';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'name',
        'description',
        'category',
        'file',
        'image',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

}
