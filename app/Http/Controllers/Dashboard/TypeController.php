<?php

namespace App\Http\Controllers\Dashboard;
use App\Models\CustomField;

use App\Models\Type;
use App\Models\Optioncustom;

use App\Models\otp;

use Illuminate\Routing\Controller;
use App\Http\Requests\Dashboard\TypeRequest;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;

class TypeController extends Controller
{
    use AuthorizesRequests, ValidatesRequests;

    /**
     * TypeController constructor.
     */
    public function __construct()
    {
        $this->authorizeResource(Type::class, 'type');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $types = Type::filter()->paginate();

        return view('dashboard.types.index', compact('types'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.types.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \App\Http\Requests\Dashboard\TypeRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(TypeRequest $request)
    {
        $type = Type::create($request->all());

        flash()->success(trans('types.messages.created'));

        return redirect()->route('dashboard.types.show', $type);
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Type $type
     * @return \Illuminate\Http\Response
     */
    public function show(Type $type)
    {
       $x = $type->option()->with(['option' => function ($query) {
        }])->paginate(); 
        return view('dashboard.types.show', compact('type','x'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Type $type
     * @return \Illuminate\Http\Response
     */
    public function edit(Type $type)
    {
        return view('dashboard.types.edit', compact('type'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \App\Http\Requests\Dashboard\TypeRequest $request
     * @param \App\Models\Type $type
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(TypeRequest $request, Type $type)
    {
        $type->update($request->all());

        flash()->success(trans('types.messages.updated'));

        return redirect()->route('dashboard.types.show', $type);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Type $type
     * @throws \Exception
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Type $type)
    {
        $type->delete();

        flash()->success(trans('types.messages.deleted'));

        return redirect()->route('dashboard.types.index');
    }

    /**
     * Display a listing of the trashed resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function trashed()
    {
        $this->authorize('viewAnyTrash', Type::class);

        $types = Type::onlyTrashed()->paginate();

        return view('dashboard.types.trashed', compact('types'));
    }

    /**
     * Display the specified trashed resource.
     *
     * @param \App\Models\Type $type
     * @return \Illuminate\Http\Response
     */
    public function showTrashed(Type $type)
    {
        $this->authorize('viewTrash', $type);

        return view('dashboard.types.show', compact('type'));
    }

    /**
     * Restore the trashed resource.
     *
     * @param \App\Models\Type $type
     * @return \Illuminate\Http\RedirectResponse
     */
    public function restore(Type $type)
    {
        $this->authorize('restore', $type);

        $type->restore();

        flash()->success(trans('types.messages.restored'));

        return redirect()->route('dashboard.types.trashed');
    }

    /**
     * Force delete the specified resource from storage.
     *
     * @param \App\Models\Type $type
     * @throws \Exception
     * @return \Illuminate\Http\RedirectResponse
     */
    public function forceDelete(Type $type)
    {
       // $this->authorize('forceDelete', $type);

        $type->forceDelete();

        flash()->success(trans('types.messages.deleted'));

        return redirect()->route('dashboard.types.trashed');
    }

    public function active($id)
    {
        $Type = Type::findorfail($id);
        $Type->active = '1' ;
        $Type->save();
        flash()->success('تم بنجاح');
        return redirect()->back();
    }


    public function disactive($id)
    {
        $Type = Type::findorfail($id);
        $Type->active = '0';
        $Type->save();
        flash()->success('تم بنجاح');
        return redirect()->back();


    }

    public function assgin(Request $request)
    {
        $Optioncustom = Optioncustom::where('cutom_id',$request->id)->where('type_id',$request->type)->first();
        if($Optioncustom != null)
        {
            flash()->error('تم تعين هذة الخاصية من قبل');
            return redirect()->back();
         
        }
        $CustomField = CustomField::findorfail($request->id);
        $Optioncustom = new Optioncustom();
        $Optioncustom->type_id=$request->type;
        $Optioncustom->cutom_id=$request->id;
        $Optioncustom->type=$CustomField->type;
        $Optioncustom->save();
        flash()->success('تم بنجاح');
        return redirect()->back();
    }

    public function del($id)
    {
        $Optioncustom = Optioncustom::findorfail($id);
        $Optioncustom->delete();
        flash()->success('تم بنجاح');
        return redirect()->back();
    }
}
