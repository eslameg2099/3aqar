<?php

namespace App\Models;
use App\Http\Filters\Filterable;
use App\Http\Filters\ArchetictureFilter;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Translatable;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use AhmedAliraqi\LaravelMediaUploader\Entities\Concerns\HasUploader;

class Archeticture extends Model implements HasMedia
{
    use HasFactory;
    use InteractsWithMedia;
    use Filterable;
    use HasUploader;
    use Translatable;
    use SoftDeletes;

    public $translatedAttributes = ['name','description'];


    protected $filter = ArchetictureFilter::class;

    protected $fillable = [
        'id',
        'type_id',
        'category_id',
        'video',
    ];

    protected $with = [
        'translations',
        
    ];

    public function Type()
    {
        return $this->belongsTo(Type::class, 'type_id');
    }
    public function category()
    {
        return $this->belongsTo(CategoryArcheticture::class, 'category_id')->withTrashed();
    }

}
