<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use App\Http\Filters\SponsorFilter;
use App\Http\Filters\Filterable;
use App\Models\Concerns\HasMediaTrait;

use Spatie\MediaLibrary\InteractsWithMedia;
use AhmedAliraqi\LaravelMediaUploader\Entities\Concerns\HasUploader;




class RequsetSponsor extends Model implements HasMedia
{
    use HasFactory;
    use InteractsWithMedia;
    use HasMediaTrait;
    use HasUploader;
    use Filterable;


    protected $filter = SponsorFilter::class;

    protected $fillable = [
        'id',
        'user_id',
        'estate_id',
        'type',
        'stauts',
        'sponser_at',
        'active'
      
    ];

    

    protected $with = [
        'media',
    ];
    protected $dates = ['sponser_at'];



    public function estate()
    {
        return $this->belongsTo(Estate::class,'estate_id');
    }

    public function user()
    {
        return $this->belongsTo(user::class,'user_id')->withTrashed();
    }

    public function check($id)
    {
        $RequsetSponsor = RequsetSponsor::findorfail($id);
        if($RequsetSponsor->stauts == 'create' && $RequsetSponsor->active == '0')
        {
            return 0;
        }
        elseif ($RequsetSponsor->stauts == 'current' && $RequsetSponsor->active == '1') {
            return 1;
        }
        elseif ($RequsetSponsor->stauts == 'cancel') {
            return 2;
        }
         elseif ($RequsetSponsor->stauts == 'finished') {
            return 3;
        }

    }





}
