<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use AhmedAliraqi\LaravelMediaUploader\Entities\Concerns\HasUploader;

class AccountBank extends Model implements HasMedia
{
    use InteractsWithMedia;

    use HasFactory;
    use HasUploader;

    protected $with = [
        'media',
    ];

    protected $fillable = [
        'titele',
        'id',
        'description',
        'name_account',
        'num_account',
        'num_iban'
    ];
}
