<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use AhmedAliraqi\LaravelMediaUploader\Entities\Concerns\HasUploader;

class Requestdocumentation extends Model implements HasMedia
{
    use HasFactory;
    use InteractsWithMedia;
    use HasUploader;


    protected $with = [
        'media',
    ];

    /**
     * The query parameter's filter of the model.
     *
     * @var string
     * 
     * 
     */

    protected $filter = ExpertFilter::class;


    protected $fillable = [
        'user_id',
       
    ];
    public function user()
    {
        return $this->belongsTo(User::class)->withTrashed();
    }




}
