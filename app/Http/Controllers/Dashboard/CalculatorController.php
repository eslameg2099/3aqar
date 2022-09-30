<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Setting;

class CalculatorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $Setting = Setting::where('key',$request->tab)->first();
        if($Setting->key == "building_Bone")
        {
            return view('dashboard.settings.tabs.buildingBone', compact('Setting'));
        }
        elseif($Setting->key == "building_key")
        {
        return view('dashboard.settings.tabs.buildingkey', compact('Setting'));
        }
        elseif($Setting->key == "tax")
        {
            return view('dashboard.settings.tabs.tax', compact('Setting'));

        }
        else {
            return view('dashboard.settings.tabs.commission', compact('Setting'));

        }


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
    public function store(Request $request)
    {
        //
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
        $Setting = Setting::findorfail($id);
        $Setting->value = $request->value ;
        $Setting->save();
        flash()->success('تم النعديل بنجاح');
        return redirect()->back();

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
