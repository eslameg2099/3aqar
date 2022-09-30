<?php

namespace App\Http\Controllers\Api;

use App\Http\Resources\SelectResource;
use App\Http\Resources\TypeResource;
use App\Models\CustomField;
use App\Models\Type;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller;

class TypeController extends Controller
{
    use AuthorizesRequests, ValidatesRequests;

    /**
     * Display a listing of the types.
     *
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function index()
    {
        
        $types = Type::filter()->get();
        return TypeResource::collection($types);
    }

    /**
     * Display the specified type.
     *
     * @param \App\Models\Type $type
     * @return \App\Http\Resources\TypeResource
     */
    public function show(Type $type)
    {
        return new TypeResource($type);
    }

    public function store()
    {

    }

    /**
     * Display the specified type.
     *
     * @param \App\Models\Type $type
     * @return \Illuminate\Http\JsonResponse
     */
    public function fields(Type $type)
    {
        $for = trans('types.for.'.$type->type);

        return response()->json([
            'data' => [
                'type' => [
                    'id' => $type->id,
                    'name' => $type->name.' '.$for,
                ],
                'fields' => [
                    
                

             
                    'buttons'  =>$type->option()->where('type',"buttons")->with(['option' => function ($query) {
                        
                    }])->get(),

                    'dropdown' => $type->option()->where('type', "dropdown")->with(['option' => function ($query) {
                    }])->get(),

                    'text' => $type->option()->where('type', "text")->with(['option' => function ($query) {
                    }])->get(),

                    'number' => $type->option()->where('type', "number")->with(['option' => function ($query) {
                    }])->get(),

                    'date' => $type->option()->where('type', "date")->with(['option' => function ($query) {
                    }])->get(),
                    
                    'switch' => $type->option()->where('type', "switch")->with(['option' => function ($query) {
                    }])->get(),
                  


                   
                ],
            ],
        ]);


        $for = trans('types.for.'.$type->type);

        return response()->json([
            'data' => [
                'type' => [
                    'id' => $type->id,
                    'name' => $type->name.' '.$for,
                ],
                'fields' => [
                    'buttons' => $type->customFields->where('type', CustomField::BUTTONS_TYPE)->values(),
                    'dropdown' => $type->customFields->where('type', CustomField::SELECT_TYPE)->values(),
                    'text' => $type->customFields->where('type', CustomField::TEXT_TYPE)->values(),
                    'number' => $type->customFields->where('type', CustomField::NUMBER_TYPE)->values(),
                    'date' => $type->customFields->where('type', CustomField::DATE_TYPE)->values(),
                    'switch' => $type->customFields->where('type', CustomField::SWITCH_TYPE)->values(),
                ],
            ],
        ]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function select()
    {
        $types = Type::filter()->simplePaginate();

        return SelectResource::collection($types);
    }
}
