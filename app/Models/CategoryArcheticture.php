<?php

namespace App\Models;
use App\Http\Filters\CategoryArchetictureFilter;
use App\Http\Filters\Filterable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Translatable;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use AhmedAliraqi\LaravelMediaUploader\Entities\Concerns\HasUploader;

class CategoryArcheticture extends Model implements HasMedia
{  
    use HasFactory;
    use InteractsWithMedia;
    use Filterable;
    use Translatable;
    use SoftDeletes;
    use HasUploader;

    public $translationForeignKey = 'category_id';

    public $translatedAttributes = ['name'];

    protected $filter = CategoryArchetictureFilter::class;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id',
    ];

    protected $with = [
        'translations',
    ];


}
