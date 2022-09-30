<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\Api\ProfileRequest;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller;
use Illuminate\Http\Request;
use App\Models\Office;

use App\Http\Resources\OfficeOwnerResource;
use App\Models\OfficeOwner;

class ProfileController extends Controller
{
    
    use AuthorizesRequests;
    use ValidatesRequests;

    public function __construct()
    {
        $this->middleware('auth:sanctum')->only('updateoffice');
    }
    /**
     * Display the authenticated user resource.
     *
     * @return \Illuminate\Http\Resources\Json\JsonResource
     */
    public function show()
    {
        return auth()->user()->refresh()->getResource();
    }

    /**
     * Update the authenticated user profile.
     *
     * @return \Illuminate\Http\Resources\Json\JsonResource
     */
    public function update(ProfileRequest $request)
    {
        
        $user = auth()->user();

        $user->update($request->allWithHashedPassword());

        if ($request->hasFile('avatar')) {
            $user->addMediaFromRequest('avatar')
                ->toMediaCollection('avatars');
        }

        return $user->refresh()->getResource();
    }

    public function updateoffice(Request $request)
    {
        $office = Office::where('user_id',auth()->user()->id)->firstorfail();
        $office->update($request->all());

        if ($request->hasFile('office_logo')) {
            $office->addMediaFromRequest('office_logo')
                ->toMediaCollection('office_logo');
        }

        $OfficeOwner = OfficeOwner::findorfail(auth()->user()->id);
        
        return new OfficeOwnerResource($OfficeOwner);
      
    }


}
;