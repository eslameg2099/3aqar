<?php

namespace App\Http\Controllers\Dashboard;
use App\Models\CustomField;
use App\Http\Requests\Dashboard\CustomFieldRequest;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Type;

class CustomFieldController extends Controller
{
   
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->authorize('viewAny', CustomField::class);

        $CustomFields = CustomField::latest()->paginate();
        return view('dashboard.CustomFields.index', compact('CustomFields'));
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('viewAny', CustomField::class);

        return view('dashboard.CustomFields.create');
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CustomFieldRequest $request)
    {
        $CustomField = CustomField::create($request->all());
        flash()->success('تم الاضافة بنجاح');
        return redirect()->route('dashboard.customfield.index');



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
        $this->authorize('viewAny', CustomField::class);
        
        $CustomField = CustomField::findorfail($id);

        $options =   $CustomField->options()->get();
        
        return view('dashboard.CustomFields.show', compact('CustomField','options'));
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
        $this->authorize('viewAny', CustomField::class);

        $types = Type::get();
        $CustomField = CustomField::findorfail($id);
        return view('dashboard.CustomFields.edit', compact('CustomField','types'));

        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CustomFieldRequest $request, $id)
    {
        $CustomField = CustomField::findorfail($id);
        $CustomField->update($request->all());
        flash()->success('تم التعديل بنجاح');
        return redirect()->route('dashboard.customfield.index');

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
        $this->authorize('viewAny', CustomField::class);

        $CustomField = CustomField::findorfail($id);
        $CustomField->delete();
        flash()->success('تم الحذف بنجاح');
        return redirect()->route('dashboard.customfield.index');

        //
    }

    public function cr($id)
    {
        $CustomFields = CustomField::get();
        $Type = Type::findorfail($id);
        return view('dashboard.types.assgin', compact('Type','CustomFields'));
    }
}
