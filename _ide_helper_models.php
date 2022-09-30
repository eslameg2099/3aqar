<?php

// @formatter:off
/**
 * A helper file for your Eloquent Models
 * Copy the phpDocs from this file to the correct Model,
 * And remove them from this file, to prevent double declarations.
 *
 * @author Barry vd. Heuvel <barryvdh@gmail.com>
 */


namespace App\Models{
/**
 * App\Models\Admin
 *
 * @property int $id
 * @property string $name
 * @property string|null $type
 * @property string|null $email
 * @property string|null $phone
 * @property string|null $firebase_id
 * @property string|null $phone_verified_at
 * @property \Illuminate\Support\Carbon|null $email_verified_at
 * @property string|null $password
 * @property string|null $certified_at
 * @property string|null $classified_at
 * @property string|null $remember_token
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property int|null $city_id
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\City[] $cities
 * @property-read int|null $cities_count
 * @property-read \App\Models\City|null $city
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Estate[] $estates
 * @property-read int|null $estates_count
 * @property-read \Spatie\MediaLibrary\MediaCollections\Models\Collections\MediaCollection|\Spatie\MediaLibrary\MediaCollections\Models\Media[] $media
 * @property-read int|null $media_count
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[] $notifications
 * @property-read int|null $notifications_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\Spatie\Permission\Models\Permission[] $permissions
 * @property-read int|null $permissions_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\Spatie\Permission\Models\Role[] $roles
 * @property-read int|null $roles_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\Laravel\Sanctum\PersonalAccessToken[] $tokens
 * @property-read int|null $tokens_count
 * @method static \Database\Factories\AdminFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|User filter(?\App\Http\Filters\BaseFilters $filters = null)
 * @method static \Illuminate\Database\Eloquent\Builder|Admin newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Admin newQuery()
 * @method static \Illuminate\Database\Query\Builder|Admin onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|User permission($permissions)
 * @method static \Illuminate\Database\Eloquent\Builder|Admin query()
 * @method static \Illuminate\Database\Eloquent\Builder|User role($roles, $guard = null)
 * @method static \Illuminate\Database\Eloquent\Builder|User sortingByIds($ids)
 * @method static \Illuminate\Database\Eloquent\Builder|Admin whereCertifiedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Admin whereCityId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Admin whereClassifiedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Admin whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Admin whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Admin whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Admin whereEmailVerifiedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Admin whereFirebaseId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Admin whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Admin whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Admin wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Admin wherePhone($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Admin wherePhoneVerifiedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Admin whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Admin whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Admin whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|Admin withTrashed()
 * @method static \Illuminate\Database\Query\Builder|Admin withoutTrashed()
 */
	class Admin extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\City
 *
 * @property int $id
 * @property int|null $parent_id
 * @property array|null $parents
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \Illuminate\Database\Eloquent\Collection|City[] $children
 * @property-read int|null $children_count
 * @property-read \Illuminate\Database\Eloquent\Collection|City[] $childrenRelation
 * @property-read int|null $children_relation_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Estate[] $estates
 * @property-read int|null $estates_count
 * @property-read string $full_name
 * @property-read City|null $parent
 * @property-read \App\Models\Translations\CityTranslation|null $translation
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Translations\CityTranslation[] $translations
 * @property-read int|null $translations_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\User[] $users
 * @property-read int|null $users_count
 * @method static \Database\Factories\CityFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|City filter(?\App\Http\Filters\BaseFilters $filters = null)
 * @method static \Illuminate\Database\Eloquent\Builder|City leafsOnly()
 * @method static \Illuminate\Database\Eloquent\Builder|City listsTranslations(string $translationField)
 * @method static \Illuminate\Database\Eloquent\Builder|City newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|City newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|City notTranslatedIn(?string $locale = null)
 * @method static \Illuminate\Database\Query\Builder|City onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|City orWhereTranslation(string $translationField, $value, ?string $locale = null)
 * @method static \Illuminate\Database\Eloquent\Builder|City orWhereTranslationLike(string $translationField, $value, ?string $locale = null)
 * @method static \Illuminate\Database\Eloquent\Builder|City orderByTranslation(string $translationField, string $sortMethod = 'asc')
 * @method static \Illuminate\Database\Eloquent\Builder|City parentsOnly()
 * @method static \Illuminate\Database\Eloquent\Builder|City query()
 * @method static \Illuminate\Database\Eloquent\Builder|City sortingByIds($ids)
 * @method static \Illuminate\Database\Eloquent\Builder|City translated()
 * @method static \Illuminate\Database\Eloquent\Builder|City translatedIn(?string $locale = null)
 * @method static \Illuminate\Database\Eloquent\Builder|City whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|City whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|City whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|City whereParentId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|City whereParents($value)
 * @method static \Illuminate\Database\Eloquent\Builder|City whereTranslation(string $translationField, $value, ?string $locale = null, string $method = 'whereHas', string $operator = '=')
 * @method static \Illuminate\Database\Eloquent\Builder|City whereTranslationLike(string $translationField, $value, ?string $locale = null)
 * @method static \Illuminate\Database\Eloquent\Builder|City whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|City withTranslation()
 * @method static \Illuminate\Database\Query\Builder|City withTrashed()
 * @method static \Illuminate\Database\Query\Builder|City withoutTrashed()
 */
	class City extends \Eloquent implements \Astrotomic\Translatable\Contracts\Translatable {}
}

namespace App\Models{
/**
 * App\Models\Contractor
 *
 * @property int $id
 * @property string|null $name
 * @property string|null $description
 * @property int|null $city_id
 * @property string|null $email
 * @property string|null $phone
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\City|null $city
 * @property-read \Spatie\MediaLibrary\MediaCollections\Models\Collections\MediaCollection|\Spatie\MediaLibrary\MediaCollections\Models\Media[] $media
 * @property-read int|null $media_count
 * @method static \Database\Factories\ContractorFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|Contractor filter(?\App\Http\Filters\BaseFilters $filters = null)
 * @method static \Illuminate\Database\Eloquent\Builder|Contractor newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Contractor newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Contractor query()
 * @method static \Illuminate\Database\Eloquent\Builder|Contractor sortingByIds($ids)
 * @method static \Illuminate\Database\Eloquent\Builder|Contractor whereCityId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Contractor whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Contractor whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Contractor whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Contractor whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Contractor whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Contractor wherePhone($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Contractor whereUpdatedAt($value)
 */
	class Contractor extends \Eloquent implements \Spatie\MediaLibrary\HasMedia {}
}

namespace App\Models{
/**
 * App\Models\CustomField
 *
 * @property int $id
 * @property string $type
 * @property bool|null $required
 * @property string $model_type
 * @property int $model_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Model|\Eloquent $model
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\FieldOption[] $options
 * @property-read int|null $options_count
 * @property-read \App\Models\Translations\CustomFieldTranslation|null $translation
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Translations\CustomFieldTranslation[] $translations
 * @property-read int|null $translations_count
 * @method static \Illuminate\Database\Eloquent\Builder|CustomField listsTranslations(string $translationField)
 * @method static \Illuminate\Database\Eloquent\Builder|CustomField newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CustomField newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CustomField notTranslatedIn(?string $locale = null)
 * @method static \Illuminate\Database\Eloquent\Builder|CustomField orWhereTranslation(string $translationField, $value, ?string $locale = null)
 * @method static \Illuminate\Database\Eloquent\Builder|CustomField orWhereTranslationLike(string $translationField, $value, ?string $locale = null)
 * @method static \Illuminate\Database\Eloquent\Builder|CustomField orderByTranslation(string $translationField, string $sortMethod = 'asc')
 * @method static \Illuminate\Database\Eloquent\Builder|CustomField query()
 * @method static \Illuminate\Database\Eloquent\Builder|CustomField translated()
 * @method static \Illuminate\Database\Eloquent\Builder|CustomField translatedIn(?string $locale = null)
 * @method static \Illuminate\Database\Eloquent\Builder|CustomField whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CustomField whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CustomField whereModelId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CustomField whereModelType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CustomField whereRequired($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CustomField whereTranslation(string $translationField, $value, ?string $locale = null, string $method = 'whereHas', string $operator = '=')
 * @method static \Illuminate\Database\Eloquent\Builder|CustomField whereTranslationLike(string $translationField, $value, ?string $locale = null)
 * @method static \Illuminate\Database\Eloquent\Builder|CustomField whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CustomField whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CustomField withTranslation()
 */
	class CustomField extends \Eloquent implements \Astrotomic\Translatable\Contracts\Translatable {}
}

namespace App\Models{
/**
 * App\Models\Customer
 *
 * @property int $id
 * @property string $name
 * @property string|null $type
 * @property string|null $email
 * @property string|null $phone
 * @property string|null $firebase_id
 * @property string|null $phone_verified_at
 * @property \Illuminate\Support\Carbon|null $email_verified_at
 * @property string|null $password
 * @property string|null $certified_at
 * @property string|null $classified_at
 * @property string|null $remember_token
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property int|null $city_id
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\City[] $cities
 * @property-read int|null $cities_count
 * @property-read \App\Models\City|null $city
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Estate[] $estates
 * @property-read int|null $estates_count
 * @property-read \Spatie\MediaLibrary\MediaCollections\Models\Collections\MediaCollection|\Spatie\MediaLibrary\MediaCollections\Models\Media[] $media
 * @property-read int|null $media_count
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[] $notifications
 * @property-read int|null $notifications_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\Spatie\Permission\Models\Permission[] $permissions
 * @property-read int|null $permissions_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\Spatie\Permission\Models\Role[] $roles
 * @property-read int|null $roles_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\Laravel\Sanctum\PersonalAccessToken[] $tokens
 * @property-read int|null $tokens_count
 * @method static \Database\Factories\CustomerFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|User filter(?\App\Http\Filters\BaseFilters $filters = null)
 * @method static \Illuminate\Database\Eloquent\Builder|Customer newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Customer newQuery()
 * @method static \Illuminate\Database\Query\Builder|Customer onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|User permission($permissions)
 * @method static \Illuminate\Database\Eloquent\Builder|Customer query()
 * @method static \Illuminate\Database\Eloquent\Builder|User role($roles, $guard = null)
 * @method static \Illuminate\Database\Eloquent\Builder|User sortingByIds($ids)
 * @method static \Illuminate\Database\Eloquent\Builder|Customer whereCertifiedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Customer whereCityId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Customer whereClassifiedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Customer whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Customer whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Customer whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Customer whereEmailVerifiedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Customer whereFirebaseId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Customer whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Customer whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Customer wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Customer wherePhone($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Customer wherePhoneVerifiedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Customer whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Customer whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Customer whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|Customer withTrashed()
 * @method static \Illuminate\Database\Query\Builder|Customer withoutTrashed()
 */
	class Customer extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Estate
 *
 * @property int $id
 * @property string $name
 * @property string $description
 * @property string|null $type
 * @property int $user_id
 * @property int $type_id
 * @property int $city_id
 * @property float $space
 * @property string $price
 * @property string|null $video
 * @property int $user_type
 * @property string|null $address
 * @property string|null $latitude
 * @property string|null $longitude
 * @property \Illuminate\Support\Carbon|null $locked_at
 * @property \Illuminate\Support\Carbon|null $sold_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\City[] $cities
 * @property-read int|null $cities_count
 * @property-read \App\Models\City $city
 * @property-read \App\Models\Type $estateType
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\FieldValue[] $fieldValues
 * @property-read int|null $field_values_count
 * @property-read \Spatie\MediaLibrary\MediaCollections\Models\Collections\MediaCollection|\Spatie\MediaLibrary\MediaCollections\Models\Media[] $media
 * @property-read int|null $media_count
 * @property-read \App\Models\User $user
 * @method static \Illuminate\Database\Eloquent\Builder|Estate distance($latitude, $longitude)
 * @method static \Database\Factories\EstateFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|Estate filter(?\App\Http\Filters\BaseFilters $filters = null)
 * @method static \Illuminate\Database\Eloquent\Builder|Estate geofence($latitude, $longitude, $inner_radius, $outer_radius)
 * @method static \Illuminate\Database\Eloquent\Builder|Estate locked()
 * @method static \Illuminate\Database\Eloquent\Builder|Estate newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Estate newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Estate notSold()
 * @method static \Illuminate\Database\Eloquent\Builder|Estate query()
 * @method static \Illuminate\Database\Eloquent\Builder|Estate sold()
 * @method static \Illuminate\Database\Eloquent\Builder|Estate sortingByIds($ids)
 * @method static \Illuminate\Database\Eloquent\Builder|Estate unlocked()
 * @method static \Illuminate\Database\Eloquent\Builder|Estate whereAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Estate whereCityId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Estate whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Estate whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Estate whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Estate whereLatitude($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Estate whereLockedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Estate whereLongitude($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Estate whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Estate wherePrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Estate whereSoldAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Estate whereSpace($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Estate whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Estate whereTypeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Estate whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Estate whereUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Estate whereUserType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Estate whereVideo($value)
 */
	class Estate extends \Eloquent implements \Spatie\MediaLibrary\HasMedia {}
}

namespace App\Models{
/**
 * App\Models\Feedback
 *
 * @property int $id
 * @property string|null $name
 * @property string|null $title
 * @property string|null $message
 * @property \Illuminate\Support\Carbon|null $read_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @method static \Database\Factories\FeedbackFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|Feedback filter(?\App\Http\Filters\BaseFilters $filters = null)
 * @method static \Illuminate\Database\Eloquent\Builder|Feedback newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Feedback newQuery()
 * @method static \Illuminate\Database\Query\Builder|Feedback onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Feedback query()
 * @method static \Illuminate\Database\Eloquent\Builder|Feedback sortingByIds($ids)
 * @method static \Illuminate\Database\Eloquent\Builder|Feedback unread()
 * @method static \Illuminate\Database\Eloquent\Builder|Feedback whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Feedback whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Feedback whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Feedback whereMessage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Feedback whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Feedback whereReadAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Feedback whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Feedback whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|Feedback withTrashed()
 * @method static \Illuminate\Database\Query\Builder|Feedback withoutTrashed()
 */
	class Feedback extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\FieldOption
 *
 * @property int $id
 * @property int $custom_field_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\CustomField $field
 * @property-read \App\Models\Translations\FieldOptionTranslation|null $translation
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Translations\FieldOptionTranslation[] $translations
 * @property-read int|null $translations_count
 * @method static \Illuminate\Database\Eloquent\Builder|FieldOption filter(?\App\Http\Filters\BaseFilters $filters = null)
 * @method static \Illuminate\Database\Eloquent\Builder|FieldOption listsTranslations(string $translationField)
 * @method static \Illuminate\Database\Eloquent\Builder|FieldOption newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|FieldOption newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|FieldOption notTranslatedIn(?string $locale = null)
 * @method static \Illuminate\Database\Eloquent\Builder|FieldOption orWhereTranslation(string $translationField, $value, ?string $locale = null)
 * @method static \Illuminate\Database\Eloquent\Builder|FieldOption orWhereTranslationLike(string $translationField, $value, ?string $locale = null)
 * @method static \Illuminate\Database\Eloquent\Builder|FieldOption orderByTranslation(string $translationField, string $sortMethod = 'asc')
 * @method static \Illuminate\Database\Eloquent\Builder|FieldOption query()
 * @method static \Illuminate\Database\Eloquent\Builder|FieldOption sortingByIds($ids)
 * @method static \Illuminate\Database\Eloquent\Builder|FieldOption translated()
 * @method static \Illuminate\Database\Eloquent\Builder|FieldOption translatedIn(?string $locale = null)
 * @method static \Illuminate\Database\Eloquent\Builder|FieldOption whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FieldOption whereCustomFieldId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FieldOption whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FieldOption whereTranslation(string $translationField, $value, ?string $locale = null, string $method = 'whereHas', string $operator = '=')
 * @method static \Illuminate\Database\Eloquent\Builder|FieldOption whereTranslationLike(string $translationField, $value, ?string $locale = null)
 * @method static \Illuminate\Database\Eloquent\Builder|FieldOption whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FieldOption withTranslation()
 */
	class FieldOption extends \Eloquent implements \Astrotomic\Translatable\Contracts\Translatable {}
}

namespace App\Models{
/**
 * App\Models\FieldValue
 *
 * @property int $id
 * @property string $model_type
 * @property int $model_id
 * @property int $custom_field_id
 * @property int|null $field_option_id
 * @property string|null $value
 * @property string $type
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\CustomField $field
 * @property-read \Illuminate\Database\Eloquent\Model|\Eloquent $model
 * @property-read \App\Models\FieldOption|null $option
 * @method static \Illuminate\Database\Eloquent\Builder|FieldValue newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|FieldValue newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|FieldValue query()
 * @method static \Illuminate\Database\Eloquent\Builder|FieldValue sortingByIds($ids)
 * @method static \Illuminate\Database\Eloquent\Builder|FieldValue whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FieldValue whereCustomFieldId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FieldValue whereFieldOptionId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FieldValue whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FieldValue whereModelId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FieldValue whereModelType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FieldValue whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FieldValue whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FieldValue whereValue($value)
 */
	class FieldValue extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Office
 *
 * @property int $id
 * @property string $name
 * @property string $description
 * @property int $user_id
 * @property int $city_id
 * @property \Illuminate\Support\Carbon|null $certified_at
 * @property \Illuminate\Support\Carbon|null $classified_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\City[] $cities
 * @property-read int|null $cities_count
 * @property-read \App\Models\City $city
 * @property-read \App\Models\OfficeOwner $user
 * @method static \Database\Factories\OfficeFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|Office newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Office newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Office query()
 * @method static \Illuminate\Database\Eloquent\Builder|Office whereCertifiedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Office whereCityId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Office whereClassifiedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Office whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Office whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Office whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Office whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Office whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Office whereUserId($value)
 */
	class Office extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\OfficeOwner
 *
 * @property int $id
 * @property string $name
 * @property string|null $type
 * @property string|null $email
 * @property string|null $phone
 * @property string|null $firebase_id
 * @property string|null $phone_verified_at
 * @property \Illuminate\Support\Carbon|null $email_verified_at
 * @property string|null $password
 * @property string|null $certified_at
 * @property string|null $classified_at
 * @property string|null $remember_token
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property int|null $city_id
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\City[] $cities
 * @property-read int|null $cities_count
 * @property-read \App\Models\City|null $city
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Estate[] $estates
 * @property-read int|null $estates_count
 * @property-read \Spatie\MediaLibrary\MediaCollections\Models\Collections\MediaCollection|\Spatie\MediaLibrary\MediaCollections\Models\Media[] $media
 * @property-read int|null $media_count
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[] $notifications
 * @property-read int|null $notifications_count
 * @property-read \App\Models\Office|null $office
 * @property-read \Illuminate\Database\Eloquent\Collection|\Spatie\Permission\Models\Permission[] $permissions
 * @property-read int|null $permissions_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\Spatie\Permission\Models\Role[] $roles
 * @property-read int|null $roles_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\Laravel\Sanctum\PersonalAccessToken[] $tokens
 * @property-read int|null $tokens_count
 * @method static \Database\Factories\OfficeOwnerFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|User filter(?\App\Http\Filters\BaseFilters $filters = null)
 * @method static \Illuminate\Database\Eloquent\Builder|OfficeOwner newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|OfficeOwner newQuery()
 * @method static \Illuminate\Database\Query\Builder|OfficeOwner onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|User permission($permissions)
 * @method static \Illuminate\Database\Eloquent\Builder|OfficeOwner query()
 * @method static \Illuminate\Database\Eloquent\Builder|User role($roles, $guard = null)
 * @method static \Illuminate\Database\Eloquent\Builder|User sortingByIds($ids)
 * @method static \Illuminate\Database\Eloquent\Builder|OfficeOwner whereCertifiedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OfficeOwner whereCityId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OfficeOwner whereClassifiedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OfficeOwner whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OfficeOwner whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OfficeOwner whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OfficeOwner whereEmailVerifiedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OfficeOwner whereFirebaseId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OfficeOwner whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OfficeOwner whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OfficeOwner wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OfficeOwner wherePhone($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OfficeOwner wherePhoneVerifiedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OfficeOwner whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OfficeOwner whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OfficeOwner whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|OfficeOwner withTrashed()
 * @method static \Illuminate\Database\Query\Builder|OfficeOwner withoutTrashed()
 */
	class OfficeOwner extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\ResetPasswordCode
 *
 * @property int $id
 * @property string $username
 * @property string $code
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|ResetPasswordCode newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ResetPasswordCode newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ResetPasswordCode query()
 * @method static \Illuminate\Database\Eloquent\Builder|ResetPasswordCode whereCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ResetPasswordCode whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ResetPasswordCode whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ResetPasswordCode whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ResetPasswordCode whereUsername($value)
 */
	class ResetPasswordCode extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\ResetPasswordToken
 *
 * @property int $id
 * @property int $user_id
 * @property string $token
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\User $user
 * @method static \Illuminate\Database\Eloquent\Builder|ResetPasswordToken newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ResetPasswordToken newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ResetPasswordToken query()
 * @method static \Illuminate\Database\Eloquent\Builder|ResetPasswordToken whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ResetPasswordToken whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ResetPasswordToken whereToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ResetPasswordToken whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ResetPasswordToken whereUserId($value)
 */
	class ResetPasswordToken extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Setting
 *
 * @property int $id
 * @property string $key
 * @property string|null $locale
 * @property string|null $value
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Spatie\MediaLibrary\MediaCollections\Models\Collections\MediaCollection|\Spatie\MediaLibrary\MediaCollections\Models\Media[] $media
 * @property-read int|null $media_count
 * @method static \Illuminate\Database\Eloquent\Builder|Setting newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Setting newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Setting query()
 * @method static \Illuminate\Database\Eloquent\Builder|Setting whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Setting whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Setting whereKey($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Setting whereLocale($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Setting whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Setting whereValue($value)
 */
	class Setting extends \Eloquent implements \Spatie\MediaLibrary\HasMedia {}
}

namespace App\Models{
/**
 * App\Models\Supervisor
 *
 * @property int $id
 * @property string $name
 * @property string|null $type
 * @property string|null $email
 * @property string|null $phone
 * @property string|null $firebase_id
 * @property string|null $phone_verified_at
 * @property \Illuminate\Support\Carbon|null $email_verified_at
 * @property string|null $password
 * @property string|null $certified_at
 * @property string|null $classified_at
 * @property string|null $remember_token
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property int|null $city_id
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\City[] $cities
 * @property-read int|null $cities_count
 * @property-read \App\Models\City|null $city
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Estate[] $estates
 * @property-read int|null $estates_count
 * @property-read \Spatie\MediaLibrary\MediaCollections\Models\Collections\MediaCollection|\Spatie\MediaLibrary\MediaCollections\Models\Media[] $media
 * @property-read int|null $media_count
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[] $notifications
 * @property-read int|null $notifications_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\Spatie\Permission\Models\Permission[] $permissions
 * @property-read int|null $permissions_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\Spatie\Permission\Models\Role[] $roles
 * @property-read int|null $roles_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\Laravel\Sanctum\PersonalAccessToken[] $tokens
 * @property-read int|null $tokens_count
 * @method static \Database\Factories\SupervisorFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|User filter(?\App\Http\Filters\BaseFilters $filters = null)
 * @method static \Illuminate\Database\Eloquent\Builder|Supervisor newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Supervisor newQuery()
 * @method static \Illuminate\Database\Query\Builder|Supervisor onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|User permission($permissions)
 * @method static \Illuminate\Database\Eloquent\Builder|Supervisor query()
 * @method static \Illuminate\Database\Eloquent\Builder|User role($roles, $guard = null)
 * @method static \Illuminate\Database\Eloquent\Builder|User sortingByIds($ids)
 * @method static \Illuminate\Database\Eloquent\Builder|Supervisor whereCertifiedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Supervisor whereCityId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Supervisor whereClassifiedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Supervisor whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Supervisor whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Supervisor whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Supervisor whereEmailVerifiedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Supervisor whereFirebaseId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Supervisor whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Supervisor whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Supervisor wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Supervisor wherePhone($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Supervisor wherePhoneVerifiedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Supervisor whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Supervisor whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Supervisor whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|Supervisor withTrashed()
 * @method static \Illuminate\Database\Query\Builder|Supervisor withoutTrashed()
 */
	class Supervisor extends \Eloquent {}
}

namespace App\Models\Translations{
/**
 * App\Models\Translations\CityTranslation
 *
 * @property int $id
 * @property int $city_id
 * @property string|null $name
 * @property string $locale
 * @method static \Illuminate\Database\Eloquent\Builder|CityTranslation newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CityTranslation newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CityTranslation query()
 * @method static \Illuminate\Database\Eloquent\Builder|CityTranslation whereCityId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CityTranslation whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CityTranslation whereLocale($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CityTranslation whereName($value)
 */
	class CityTranslation extends \Eloquent {}
}

namespace App\Models\Translations{
/**
 * App\Models\Translations\CustomFieldTranslation
 *
 * @property int $id
 * @property int $custom_field_id
 * @property string|null $name
 * @property string|null $prefix
 * @property string|null $suffix
 * @property string $locale
 * @method static \Illuminate\Database\Eloquent\Builder|CustomFieldTranslation newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CustomFieldTranslation newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CustomFieldTranslation query()
 * @method static \Illuminate\Database\Eloquent\Builder|CustomFieldTranslation whereCustomFieldId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CustomFieldTranslation whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CustomFieldTranslation whereLocale($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CustomFieldTranslation whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CustomFieldTranslation wherePrefix($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CustomFieldTranslation whereSuffix($value)
 */
	class CustomFieldTranslation extends \Eloquent {}
}

namespace App\Models\Translations{
/**
 * App\Models\Translations\FieldOptionTranslation
 *
 * @property int $id
 * @property int $field_option_id
 * @property string|null $name
 * @property string $locale
 * @method static \Illuminate\Database\Eloquent\Builder|FieldOptionTranslation newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|FieldOptionTranslation newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|FieldOptionTranslation query()
 * @method static \Illuminate\Database\Eloquent\Builder|FieldOptionTranslation whereFieldOptionId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FieldOptionTranslation whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FieldOptionTranslation whereLocale($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FieldOptionTranslation whereName($value)
 */
	class FieldOptionTranslation extends \Eloquent {}
}

namespace App\Models\Translations{
/**
 * App\Models\Translations\TypeTranslation
 *
 * @property int $id
 * @property int $type_id
 * @property string|null $name
 * @property string $locale
 * @method static \Illuminate\Database\Eloquent\Builder|TypeTranslation newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|TypeTranslation newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|TypeTranslation query()
 * @method static \Illuminate\Database\Eloquent\Builder|TypeTranslation whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TypeTranslation whereLocale($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TypeTranslation whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TypeTranslation whereTypeId($value)
 */
	class TypeTranslation extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Type
 *
 * @property int $id
 * @property string $type
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\CustomField[] $customFields
 * @property-read int|null $custom_fields_count
 * @property-read \App\Models\Translations\TypeTranslation|null $translation
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Translations\TypeTranslation[] $translations
 * @property-read int|null $translations_count
 * @method static \Database\Factories\TypeFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|Type filter(?\App\Http\Filters\BaseFilters $filters = null)
 * @method static \Illuminate\Database\Eloquent\Builder|Type listsTranslations(string $translationField)
 * @method static \Illuminate\Database\Eloquent\Builder|Type newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Type newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Type notTranslatedIn(?string $locale = null)
 * @method static \Illuminate\Database\Query\Builder|Type onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Type orWhereTranslation(string $translationField, $value, ?string $locale = null)
 * @method static \Illuminate\Database\Eloquent\Builder|Type orWhereTranslationLike(string $translationField, $value, ?string $locale = null)
 * @method static \Illuminate\Database\Eloquent\Builder|Type orderByTranslation(string $translationField, string $sortMethod = 'asc')
 * @method static \Illuminate\Database\Eloquent\Builder|Type query()
 * @method static \Illuminate\Database\Eloquent\Builder|Type sortingByIds($ids)
 * @method static \Illuminate\Database\Eloquent\Builder|Type translated()
 * @method static \Illuminate\Database\Eloquent\Builder|Type translatedIn(?string $locale = null)
 * @method static \Illuminate\Database\Eloquent\Builder|Type whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Type whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Type whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Type whereTranslation(string $translationField, $value, ?string $locale = null, string $method = 'whereHas', string $operator = '=')
 * @method static \Illuminate\Database\Eloquent\Builder|Type whereTranslationLike(string $translationField, $value, ?string $locale = null)
 * @method static \Illuminate\Database\Eloquent\Builder|Type whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Type whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Type withTranslation()
 * @method static \Illuminate\Database\Query\Builder|Type withTrashed()
 * @method static \Illuminate\Database\Query\Builder|Type withoutTrashed()
 */
	class Type extends \Eloquent implements \Astrotomic\Translatable\Contracts\Translatable {}
}

namespace App\Models{
/**
 * App\Models\User
 *
 * @property int $id
 * @property string $name
 * @property string|null $type
 * @property string|null $email
 * @property string|null $phone
 * @property string|null $firebase_id
 * @property string|null $phone_verified_at
 * @property \Illuminate\Support\Carbon|null $email_verified_at
 * @property string|null $password
 * @property string|null $certified_at
 * @property string|null $classified_at
 * @property string|null $remember_token
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property int|null $city_id
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\City[] $cities
 * @property-read int|null $cities_count
 * @property-read \App\Models\City|null $city
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Estate[] $estates
 * @property-read int|null $estates_count
 * @property-read \Spatie\MediaLibrary\MediaCollections\Models\Collections\MediaCollection|\Spatie\MediaLibrary\MediaCollections\Models\Media[] $media
 * @property-read int|null $media_count
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[] $notifications
 * @property-read int|null $notifications_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\Spatie\Permission\Models\Permission[] $permissions
 * @property-read int|null $permissions_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\Spatie\Permission\Models\Role[] $roles
 * @property-read int|null $roles_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\Laravel\Sanctum\PersonalAccessToken[] $tokens
 * @property-read int|null $tokens_count
 * @method static \Database\Factories\UserFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|User filter(?\App\Http\Filters\BaseFilters $filters = null)
 * @method static \Illuminate\Database\Eloquent\Builder|User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User newQuery()
 * @method static \Illuminate\Database\Query\Builder|User onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|User permission($permissions)
 * @method static \Illuminate\Database\Eloquent\Builder|User query()
 * @method static \Illuminate\Database\Eloquent\Builder|User role($roles, $guard = null)
 * @method static \Illuminate\Database\Eloquent\Builder|User sortingByIds($ids)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereCertifiedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereCityId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereClassifiedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmailVerifiedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereFirebaseId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User wherePhone($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User wherePhoneVerifiedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|User withTrashed()
 * @method static \Illuminate\Database\Query\Builder|User withoutTrashed()
 */
	class User extends \Eloquent implements \Spatie\MediaLibrary\HasMedia {}
}

namespace App\Models{
/**
 * App\Models\Verification
 *
 * @property \Carbon\Carbon $created_at
 * @property int $id
 * @property int $user_id
 * @property string $phone
 * @property string $code
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\User $user
 * @method static \Illuminate\Database\Eloquent\Builder|Verification newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Verification newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Verification query()
 * @method static \Illuminate\Database\Eloquent\Builder|Verification whereCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Verification whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Verification whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Verification wherePhone($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Verification whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Verification whereUserId($value)
 */
	class Verification extends \Eloquent {}
}

