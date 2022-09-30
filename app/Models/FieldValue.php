<?php

namespace App\Models;

use App\Support\Traits\Selectable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class FieldValue extends Model
{
    use HasFactory;
    use Selectable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'model_id',
        'model_type',
        'custom_field_id',
        'field_option_id',
        'value',
        'type',
    ];

    /**
     * Retrieve the custom field instance.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function field(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(CustomField::class, 'custom_field_id');
    }

    /**
     * Retrieve the field option instance.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function option(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(FieldOption::class,'value');
    }

    /**
     * Get the model that associated the field value.
     *
     * @return \Illuminate\Database\Eloquent\Relations\MorphTo
     */
    public function model(): \Illuminate\Database\Eloquent\Relations\MorphTo
    {
        return $this->morphTo('model');
    }
}
