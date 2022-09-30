<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Api\CalculatorRequest;
use App\Models\Setting;

class CalculatorController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:sanctum');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CalculatorRequest $request)
    {
        if($request->type == "building")
        {
            
          $value['building_Bone'] =  $request->space * Setting::where('key','building_Bone')->first()->value ;
          $value['building_key'] = $request->space * Setting::where('key','building_key')->first()->value ;
       
          return['data'=>[
            'building_Bone' => number_format($value['building_Bone']),
            'building_key' => number_format($value['building_key']),
          ]];

        }
        else
        $value['building_buy'] =  $request->space + ($request->space * (Setting::where('key','tax')->first()->value /100) )   + ($request->space * (Setting::where('key','commission')->first()->value /100) )  ;
        return['data'=>[
            'building_buy' => number_format($value['building_buy']),
        ]];

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
