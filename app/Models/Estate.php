<?php

namespace App\Models;

use App\Http\Filters\Filterable;
use App\Models\Concerns\HasFieldValues;
use App\Models\Concerns\HasMediaTrait;
use App\Models\Concerns\HasYoutubeUrl;
use App\Models\Concerns\Lockable;
use App\Models\Like;
use App\Models\RequsetSponsor;


use App\Models\Concerns\Soldable;

use ChristianKuri\LaravelFavorite\Traits\Favoriteable;
use Illuminate\Validation\ValidationException;
use Malhal\Geographical\Geographical;
use Spatie\MediaLibrary\HasMedia;
use App\Support\Traits\Selectable;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\InteractsWithMedia;
use App\Http\Filters\EstateFilter;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use AhmedAliraqi\LaravelMediaUploader\Entities\Concerns\HasUploader;

class Estate extends Model implements HasMedia
{
    use HasFactory;
    use InteractsWithMedia;
    use HasMediaTrait;
    use HasUploader;
    use Filterable;
    use Selectable;
    use HasYoutubeUrl;
    use HasFieldValues;
    use Lockable;
    use Soldable;
    use Geographical;
    use Favoriteable;

    /**
     * The code of owner user type.
     *
     * @var int
     */
    const OWNER_USER_TYPE = 1;

    /**
     * The code of marketer user type.
     *
     * @var int
     */
    const MARKETER_USER_TYPE = 2;

    /**
     * The code of agent user type.
     *
     * @var int
     */
    const AGENT_USER_TYPE = 3;

    /**
     * The name of latitude column.
     *
     * @var string
     */
    const LATITUDE  = 'latitude';

    /**
     * The name of longitude column.
     *
     * @var string
     */
    const LONGITUDE = 'longitude';

    /**
     * The relations to eager load on every query.
     *
     * @var array
     */
    protected $with = [
        'media',
    ];

    /**
     * The query parameter's filter of the model.
     *
     * @var string
     */
    protected $filter = EstateFilter::class;

    /**
     * The name of youtube url column.
     *
     * @var string
     */
    protected $youtube_field = 'video';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'description',
        'type',
        'user_id',
        'type_id',
        'city_id',
        'agent_id',
        'marketer_id',
        'space',
        'price',
        'video',
        'user_type',
        'address',
        'latitude',
        'longitude',
        'published_at',
    ];

    /**
     * The default unit of distance.
     *
     * @var bool
     */
    protected static $kilometers = true;

    public function estateType()
    {
        return $this->belongsTo(Type::class, 'type_id')->withTrashed();
    }

    /**
     * Define the media collections.
     *
     * @return void
     */
    public function registerMediaCollections(): void
    {
        $this
            ->addMediaCollection('default')
            ->useFallbackPath(public_path('images/placeholder.png'))
            ->useFallbackUrl(url('images/placeholder.png'));
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function city()
    {
        return $this->belongsTo(City::class)->withTrashed();
    }

    public function RequsetSponsor()
    {
        return $this->hasone(RequsetSponsor::class,'estate_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class)->withTrashed();
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function cities()
    {
        return $this->belongsToMany(City::class);
    }


    public function scopeActive($query)
    {
        return $query->where('sold_at',null)->where('locked_at',null);
    }


    public function isSpecial($estat)
    {
         $RequsetSponsor = RequsetSponsor::where('estate_id',$estat)->where('stauts','current')->where('sponser_at' ,'>=',now())
         ->where('active' ,'1')->first();
         if($RequsetSponsor != null)
         {
             return 1 ;
         }
         else
         return 0;
    }

    public function islike($id,$estat)
    {
         $like = Like::where('user_id',$id)->where('estate_id',$estat)->where('like','1')->first();
         if($like != null)
         {
             return 1 ;
         }
         else
         return 0;
    }

    public function isdislike($id,$estat)
    {
         $like = Like::where('user_id',$id)->where('estate_id',$estat)->where('like','0')->first();
         if($like != null)
         {
             return 1 ;
         }
         else
         return 0;
         
    }


    public function ismyestate($id,$estat)
    {
        $Estate = Estate::where('user_id',$id)->where('id',$estat)->first();
        if($Estate != null)
        {
            return 1;
        }
        else
        return 0;
    }


    public function Like()
    {
        return $this->hasMany(Like::class,'estate_id');
    }

    public function z()
    {
        return $this->hasMany(FieldValue::class,'model_id');

    }
    

    /**
     * @param array $fields
     * @return $this
     */
    public function addCustomFields(array $fields = []): Estate
    {
        $this->fieldValues()->delete();

        $this->estateType->option()
            ->each(function (Optioncustom $customField) use ($fields) {
                // Validate required custom fields.
                if ($customField->required && is_null(data_get($fields, $customField->option->id))) {
                    throw ValidationException::withMessages([
                        'field.'.$customField->option->id => trans('validation.required', ['attribute' => $customField->option->name]),
                    ]);
                }

                if (is_null(data_get($fields, $customField->option->id))) {
                    return;
                }

                $data = [
                    'custom_field_id' => $customField->option->id,
                    'type' => $customField->option->type,

                ];

                if (in_array($customField->type, CustomField::OPTIONS_TYPES)
                    && $option = $customField->option->find(data_get($fields, $customField->option->id))) {
                    $data['field_option_id'] = $option->id;
                    $data['value'] = data_get($fields, $customField->option->id);

                } else {
                  
                   
                                    
                    $data['value'] = data_get($fields, $customField->option->id);
                    
 
                }
 
                $this->fieldValues()->create($data);




            });

        return $this;
    }
}
