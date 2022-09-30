<?php

namespace App\Http\Controllers\Api;

use App\Http\Resources\CityResource;
use App\Http\Resources\NestedSelectResource;
use App\Http\Resources\SelectResource;
use App\Models\City;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller;

class CityController extends Controller
{
    use AuthorizesRequests;
    use ValidatesRequests;

    /**
     * Display a listing of the cities.
     *
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function index()
    {
        $cities = City::active()->filter()->parentsOnly()->withCount('children')->get();

        return CityResource::collection($cities);
    }

    /**
     * Display the specified city.
     *
     * @return \App\Http\Resources\CityResource
     */
    public function show(City $city)
    {
        return new CityResource(
            $city->load([
                'children' => function ($query) {
                    $query->withCount('children');
                },
            ])
                ->loadCount('children')
        );
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function select()
    {
        
        $cities = City::filter()->parentsOnly()->simplePaginate();

        return NestedSelectResource::collection($cities);
    }

    /**
     * Display a listing of the resource.
     *
     * @param \App\Models\City $city
     * @return \App\Http\Resources\NestedSelectResource
     */
    public function selectShow(City $city)
    {
        return new NestedSelectResource($city->load('children'));
    }
}
