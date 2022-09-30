<?php

namespace App\Http\Controllers\Dashboard;
use App\Models\CustomField;
use App\Models\FieldOption;
use App\Http\Requests\Dashboard\FieldOptionRequest;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class OptionFieldController extends Controller
{
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
    public function create($id)
    {
        $CustomField = CustomField::findorfail($id);
        return view('dashboard.option.create', compact('CustomField'));

        //
    }

   

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(FieldOptionRequest $request)
    {
        $FieldOption = FieldOption::create($request->all());
        flash()->success('تم بنجاح');
        return redirect()->back();
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
        $FieldOption = FieldOption::findorfail($id);
       // $CustomField = CustomField::findorfail($id);
        return view('dashboard.option.edit', compact('FieldOption'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(FieldOptionRequest $request, $id)
    {
        $FieldOption = FieldOption::findorfail($id);
        $FieldOption->update($request->all());
        flash()->success('تم بنجاح');
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
        $FieldOption = FieldOption::findorfail($id);
        $FieldOption->delete();
        flash()->success('تم بنجاح');
        return redirect()->back();
    }
}
