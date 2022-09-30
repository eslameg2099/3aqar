<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\CustomField;

class Optioncustom extends Model
{
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
    use HasFactory;

   protected $hidden = ['id','type_id','cutom_id','created_at','updated_at','type','required'];
    
    public function option()
    {
        return $this->belongsTo(CustomField::class,'cutom_id');
    }


    public function c()
    {
        return $this->hasMany(CustomField::class,'cutom_id');
    }

   
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
            $fieldValue = $estate->fieldValues()->where('custom_field_id', $this->option->id)->first();

            if ($fieldValue) {
                if (in_array($fieldValue->field->type, CustomField::OPTIONS_TYPES)) {
                    $value = $fieldValue->value;
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
            'id' => $this->option->id,
            'label' => $this->option->name,
            'type' => $this->type,
            'required' => !! $this->required,
            'value' =>  $value,
            'check' => $check,
        ]; 
          if (in_array($this->type, self::OPTIONS_TYPES)) {
            $data['options'] = $this->option->options->map(function ($option) {
                return [
                    'id' => $option->id,
                    'name' => $option->name,
                ];
            });
        }

       

        return $data;
    }




  

}
