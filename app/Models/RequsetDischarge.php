<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use AhmedAliraqi\LaravelMediaUploader\Entities\Concerns\HasUploader;

class RequsetDischarge extends Model implements HasMedia
{
    use HasFactory;
    use InteractsWithMedia;
    use HasUploader;

    protected $fillable = [
        'id',
        'user_id',
      
    ];

    protected $with = [
        'media',
    ];
}
