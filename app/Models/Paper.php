<?php

namespace App\Models;

use App\Traits\Auditable;
use DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Paper extends Model implements HasMedia
{
    use SoftDeletes, InteractsWithMedia, Auditable, HasFactory;

    public $table = 'papers';

    protected $appends = [
        'papers',
        'file_upload',
    ];

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
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
    public function employer()
    {
        return $this->belongsTo(User::class);
    }
    
    
    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

    public function registerMediaConversions(Media $media = null): void
    {
        $this->addMediaConversion('thumb')->fit('crop', 50, 50);
        $this->addMediaConversion('preview')->fit('crop', 120, 120);
    }

    public function getPapersAttribute()
    {
        return $this->getMedia('papers')->last();
    }

    public function paper_title()
    {
        return $this->belongsTo(User::class, 'paper_title_id');
    }

    public function getFileUploadAttribute()
    {
        return $this->getMedia('file_upload')->last();
    }
}
