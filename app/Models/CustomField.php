<?php

namespace App\Models;

use App\Http\Filters\Filterable;
use App\Support\Traits\Selectable;
use App\Http\Filters\CustomFieldFilter;
use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;

class CustomField extends Model implements TranslatableContract
{
    use HasFactory;
    use Translatable;

    /**
     * The code of the text type.
     *
     * @var string
     */
    const TEXT_TYPE = 'text';

    /**
     * The code of the textarea type.
     *
     * @var string
     */
    const TEXTAREA_TYPE = 'textarea';

    /**
     * The code of the number type.
     *
     * @var string
     */
    const NUMBER_TYPE = 'number';

    /**
     * The code of the email type.
     *
     * @var string
     */
    const EMAIL_TYPE = 'email';

    /**
     * The code of the phone type.
     *
     * @var string
     */
    const PHONE_TYPE = 'phone';

    /**
     * The code of the date type.
     *
     * @var string
     */
    const DATE_TYPE = 'date';

    /**
     * The code of the select type.
     *
     * @var string
     */
    const SELECT_TYPE = 'select';

    /**
     * The code of the buttons type.
     *
     * @var string
     */
    const BUTTONS_TYPE = 'buttons';

    /**
     * The code of the switch type.
     *
     * @var string
     */
    const SWITCH_TYPE = 'switch';

    /**
     * The list of types that should has options.
     *
     * @var string[]
     */
    const OPTIONS_TYPES = [
        self::SELECT_TYPE,
        self::BUTTONS_TYPE,
    ];

    /**
     * The translated attributes that are mass assignable.
     *
     * @var array
     */
    public $translatedAttributes = [
        'name',
        'prefix',
        'suffix',
    ];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id',
        'type',
        'required',
        'model_id',
        'model_type',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'required' => 'boolean',
    ];

    /**
     * The relations to eager load on every query.
     *
     * @var array
     */
    protected $with = [
        'options',
        'translations',
    ];

    public function types()
    {
        return $this->belongsTo(Type::class, 'model_id');
    }

    

    /**
     * Get the model that associated the custom field.
     *
     * @return \Illuminate\Database\Eloquent\Relations\MorphTo
     */
    public function model(): \Illuminate\Database\Eloquent\Relations\MorphTo
    {
        return $this->morphTo('model');
    }

    /**
     * Get all the custom field options.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function options(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(FieldOption::class, 'custom_field_id');
    }

    /**
     * Convert the model instance to an array.
     *
     * @return array
     */
    public function toArray()
    {
        $value = null;
        $check = null;
        if($this->type == CustomField::SWITCH_TYPE) {
            $check = false;
        }
        /** @var \App\Models\Estate $estate */
        if (request('estate_id') && $estate = Estate::find(request('estate_id'))) {
            /** @var \App\Models\FieldValue $fieldValue */
            $fieldValue = $estate->fieldValues()->where('custom_field_id', $this->id)->first();

            if ($fieldValue) {
                if (in_array($fieldValue->field->type, CustomField::OPTIONS_TYPES)) {
                    $value = $fieldValue->field_option_id;
                } elseif($fieldValue->field->type == CustomField::SWITCH_TYPE) {
                    $value = null;
                    $check = (bool) $fieldValue->value;
                }
                else {
                    $value = (string) $fieldValue->value;
                }
            }
        }
        $data = [
            'id' => $this->id,
            'label' => $this->name,
            'type' => $this->type,
            'required' => !! $this->required,
            'value' => $value,
            'check' => $check,
        ];

        if (in_array($this->type, self::OPTIONS_TYPES)) {
            $data['options'] = $this->options->map(function ($option) {
                return [
                    'id' => $option->id,
                    'name' => $option->name,
                ];
            });
        }

        return $data;
    }
}
