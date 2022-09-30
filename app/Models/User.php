<?php

namespace App\Models;

use ChristianKuri\LaravelFavorite\Traits\Favoriteability;
use Illuminate\Database\Eloquent\SoftDeletes;
use Parental\HasChildren;
use App\Http\Filters\Filterable;
use App\Http\Filters\UserFilter;
use Laravel\Sanctum\HasApiTokens;
use Spatie\MediaLibrary\HasMedia;
use App\Support\Traits\Selectable;
use App\Models\Helpers\UserHelpers;
use Spatie\Permission\Traits\HasRoles;
use App\Http\Resources\CustomerResource;
use App\Models\Presenters\UserPresenter;
use Illuminate\Notifications\Notifiable;
use Laracasts\Presenter\PresentableTrait;
use App\Support\Chat\Contracts\ChatMember;
use Lab404\Impersonate\Models\Impersonate;
use Spatie\MediaLibrary\InteractsWithMedia;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use AhmedAliraqi\LaravelMediaUploader\Entities\Concerns\HasUploader;
use App\Models\Like;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;
use App\Facades\Pusher;

class User extends Authenticatable implements HasMedia, ChatMember
{
    use HasFactory;
    use Notifiable;
    use UserHelpers;
    use HasChildren;
    use InteractsWithMedia;
    use HasApiTokens;
    use HasChildren;
    use PresentableTrait;
    use Filterable;
    use Selectable;
    use HasUploader;
    use Impersonate;
    use HasRoles;
    use SoftDeletes;
    use Favoriteability;

    /**
     * The code of admin type.
     *
     * @var string
     */
    public const ADMIN_TYPE = 'admin';

    /**
     * The code of supervisor type.
     *
     * @var string
     */
    public const SUPERVISOR_TYPE = 'supervisor';

    /**
     * The code of customer type.
     *
     * @var string
     */
    public const OFFICE_OWNER_TYPE = 'office_owner';

    /**
     * The code of customer type.
     *
     * @var string
     */
    public const CUSTOMER_TYPE = 'customer';

    /**
     * The guard name of the user permissions.
     *
     * @var string
     */
    protected $guard_name = 'web';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'phone',
        'city_id',
        'password',
        'declared_id',
        'remember_token',
        
    ];

    /**
     * The relations to eager load on every query.
     *
     * @var array
     */
    protected $with = ['media'];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * @var array
     */
    protected $childTypes = [
        self::ADMIN_TYPE => Admin::class,
        self::SUPERVISOR_TYPE => Supervisor::class,
        self::CUSTOMER_TYPE => Customer::class,
        self::OFFICE_OWNER_TYPE => OfficeOwner::class,
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * The presenter class name.
     *
     * @var string
     */
    protected $presenter = UserPresenter::class;

    /**
     * The model filter name.
     *
     * @var string
     */
    protected $filter = UserFilter::class;

    /**
     * Get the dashboard profile link.
     */
    public function dashboardProfile(): string
    {
        return '#';
    }

    /**
     * Get the number of models to return per page.
     *
     * @return int
     */
    public function getPerPage()
    {
        return request('perPage', parent::getPerPage());
    }

    /**
     * Get the resource for customer type.
     *
     * @return \App\Http\Resources\CustomerResource
     */
    public function getResource()
    {
        return new CustomerResource($this);
    }

    /**
     * Get the access token currently associated with the user. Create a new.
     *
     * @param string|null $device
     *
     * @return string
     */
    public function createTokenForDevice($device = null)
    {
        $device = $device ?: 'Unknown Device';

        $this->tokens()->where('name', $device)->delete();

        return $this->createToken($device)->plainTextToken;
    }

    /**
     * Define the media collections.
     */
    public function registerMediaCollections(): void
    {
        $this
            ->addMediaCollection('avatars')
            ->useFallbackUrl('https://www.gravatar.com/avatar/'.md5($this->email).'?d=mm')
            ->singleFile()
            ->registerMediaConversions(function () {
                $this->addMediaConversion('thumb')
                    ->width(70)
                    ->format('png');

                $this->addMediaConversion('small')
                    ->width(120)
                    ->format('png');

                $this->addMediaConversion('medium')
                    ->width(160)
                    ->format('png');

                $this->addMediaConversion('large')
                    ->width(320)
                    ->format('png');
            });
        $this->addMediaCollection('commercial_register')->singleFile();
        $this->addMediaCollection('classification_certificate')->singleFile();
    }

    /**
     * Determine whither the user can impersonate another user.
     *
     * @return bool
     */
    public function canImpersonate()
    {
        return $this->isAdmin();
    }

    /**
     * Determine whither the user can be impersonated by the admin.
     *
     * @return bool
     */
    public function canBeImpersonated()
    {
        return $this->isSupervisor();
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function city()
    {
        return $this->belongsTo(City::class, 'city_id')->withTrashed();
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function cities()
    {
        return $this->belongsToMany(City::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function estates()
    {
        return $this->hasMany(Estate::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function orders()
    {
        return $this->hasMany(Order::class,'user_id');
    }

    public function RequsetSponsors()
    {
        return $this->hasMany(RequsetSponsor::class,'user_id');
    }
    

    /**
     * Get the office of the user.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function office()
    {
        return $this->hasOne(Office::class, 'user_id');
    }

    public function Discharge()
    {
        return $this->hasOne(RequsetDischarge::class, 'user_id');
    }

    
    public function Blocks()
    { 
        return $this->hasMany(Block::class,'user_id');
    }


    public function isSubscribedTo(string $channelName): bool
    {
        $channelName = Str::startsWith($channelName, 'presence-') ? $channelName : "presence-$channelName";

        $response = Pusher::get("/channels/$channelName/users");

        if ($response && data_get($response, 'status') == 200) {
            return collect(data_get($response, 'result.users'))->where('id', $this->getKey())->isNotEmpty();
        }

        return false;
    }
    public function isblocked($id,$block_id)
    {
        $Block= Block::where('user_id',$id)->where('block_id',$block_id)
        ->orwhere('block_id',$id)->where('user_id',$block_id)
        ->first();
        if($Block != null)
        {
           return 1;
        }
        else 
        return 0;
    }


    public function notifications()
    {
        return $this->morphMany(Notification::class, 'notifiable')->orderBy('created_at', 'desc');
    }
    
}
