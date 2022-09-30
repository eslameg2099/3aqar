<?php

namespace App\Http\Controllers\Api;

use App\Events\EstateCreated;
use App\Http\Requests\Api\EstateRequest;
use App\Http\Resources\EstateResource;
use App\Http\Resources\SelectResource;
use App\Models\Estate;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class EstateController extends Controller
{
    use AuthorizesRequests, ValidatesRequests;

    /**
     * EstateController constructor.
     */
    public function __construct()
    {
        $this->middleware('auth:sanctum')->except('index', 'show', 'select');
    }

    /**
     * Display a listing of the estates.
     *
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function index()
    {
        $estates = Estate::active()->filter()->with(['cities' => function ($query) {
            $query->withCount('children');
        }])->latest('published_at')->simplePaginate();

        return EstateResource::collection($estates);
    }

    /**
     * Display a listing of my estates.
     *
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function getMyEstates()
    {
        $estates = auth()->user()->estates()->active()->filter()->latest('published_at')->simplePaginate();

        return EstateResource::collection($estates);
    }

    /**
     * Display the specified estate.
     *
     * @param \App\Models\Estate $estate
     *
     * @return \App\Http\Resources\EstateResource
     */
    public function show(Estate $estate)
    {
        $estate->load(['cities' => function ($query) {
            $query->withCount('children');
        }]);
        return new EstateResource($estate);
    }

    /**
     * Store the newly created estate.
     *
     * @param \App\Http\Requests\Api\EstateRequest $request
     *
     * @return \App\Http\Resources\EstateResource
     */
    public function store(Request $request)
    {

        $estate = $request->user()->estates()->create($request->all());
    
       
        $estate->addCustomFields($request->input('fields'));
       
        $estate->uploadFile('images');

        event(new EstateCreated($estate));

        return new EstateResource($estate);
    }

    /**
     * Store the newly created estate.
     *
     * @param \App\Http\Requests\Api\EstateRequest $request
     * @param \App\Models\Estate $estate
     * @throws \Illuminate\Validation\ValidationException
     * @return \App\Http\Resources\EstateResource
     */
    public function update(EstateRequest $request, Estate $estate)
    {
        if($estate->user_id != auth()->user()->id)
        {
            return response()->json([
                'message' => "غير متاح لك",
            ],401); 
        }
        else

        $estate->update($request->all());

        $estate->addCustomFields($request->input('fields'));

        $estate->uploadFile('images');

        return new EstateResource($estate);
    }

    public function republish(Estate $estate)
    {

        if($estate->user_id != auth()->user()->id)
        {
            return response()->json([
                'message' => "غير متاح لك",
            ],401); 
        }
        else

        $estate->forceFill(['published_at' => now()])->save();

        return new EstateResource($estate);
    }

    /**
     * Lock Or Unlock the given estate.
     *
     * @return \App\Http\Resources\EstateResource
     */
    public function toggleLock(Estate $estate)
    {
        if($estate->user_id != auth()->user()->id)
        {
            return response()->json([
                'message' => "غير متاح لك",
            ],401); 
        }
        else

        if ($estate->locked_at != null) {
            DB::table('estates')->where('id', $estate->id)
              ->update(['locked_at' => null]);
           
          
        } else {
            DB::table('estates')->where('id', $estate->id)
            ->update(['locked_at' => now()]);
                  }

        return new EstateResource($estate);
    }

    /**
     * List all the favorite estates.
     *
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function listFavorites()
    {
        $estates = Estate::onlyFavorited()->simplePaginate();

        return EstateResource::collection($estates);
    }

    /**
     * Add Or Remove estate from favorites.
     *
     * @param \App\Models\Estate $estate
     * @return \App\Http\Resources\EstateResource
     */
    public function favorite(Estate $estate)
    {
        $estate->toggleFavorite();

        return new EstateResource($estate);
    }

    /**
     * Destroy the given estate from storage.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(Estate $estate)
    {
        if($estate->user_id != auth()->user()->id)
        {
            return response()->json([
                'message' => "غير متاح لك",
            ],401); 
        }
        else
        $estate->delete();

        return response()->json([
            'message' => trans('estates.messages.deleted'),
        ]);
    }

    /**
     * Mark the given estate as sold or not sold.
     *
     * @return \App\Http\Resources\EstateResource
     */
    public function toggleSold(Estate $estate)
    {
        if($estate->user_id != auth()->user()->id)
        {
            return response()->json([
                'message' => "غير متاح لك",
            ],401); 
        }
        else
        
        if ($estate->sold_at != null) {
            DB::table('estates')->where('id', $estate->id)
            ->update(['sold_at' => null]);
        } else {
            DB::table('estates')->where('id', $estate->id)
            ->update(['sold_at' => now()]); 
               }

        return new EstateResource($estate);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function select()
    {
        $estates = Estate::filter()->simplePaginate();

        return SelectResource::collection($estates);
    }
}
