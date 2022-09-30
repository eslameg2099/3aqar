<?php

namespace App\Http\Controllers\Dashboard;
use App\Http\Requests\Dashboard\ArchetictureRequest;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Archeticture;
use App\Models\Type;
use App\Models\CategoryArcheticture;

class ArchetictureController extends Controller
{
   
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->authorize('viewAny', Archeticture::class);

        
        $Archetictures = Archeticture::filter()->paginate();

        return view('dashboard.archeticture.index', compact('Archetictures'));
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('viewAny', Archeticture::class);

        $CategoryArchetictures = CategoryArcheticture::get();
        $types = Type::where('type','0')->get();
        return view('dashboard.archeticture.create', compact('types','CategoryArchetictures'));  
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ArchetictureRequest $request)
    {
        $Archeticture = Archeticture::create($request->all());

        $Archeticture->addAllMediaFromTokens();

        flash()->success(trans('Archeticture.messages.created'));

        return redirect()->route('dashboard.archeticture.show', $Archeticture);
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
        $this->authorize('viewAny', Archeticture::class);

        $Archeticture = Archeticture::findorfail($id);
        return view('dashboard.archeticture.show', compact('Archeticture'));
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
        $this->authorize('viewAny', Archeticture::class);

        $Archeticture = Archeticture::findorfail($id);
        $CategoryArchetictures = CategoryArcheticture::get();
        $types = Type::where('type','0')->get();
        return view('dashboard.archeticture.edit', compact('types','CategoryArchetictures','Archeticture'));  

        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ArchetictureRequest $request, $id)
    {
        $Archeticture = Archeticture::findorfail($id);

        $Archeticture->update($request->all());

        $Archeticture->addAllMediaFromTokens();

        flash()->success(trans('Archeticture.messages.updated'));

        return redirect()->route('dashboard.archeticture.show', $Archeticture);
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
        $this->authorize('viewAny', Archeticture::class);

        $Archeticture = Archeticture::findorfail($id);

        $Archeticture->delete();

        flash()->success(trans('Archeticture.messages.deleted'));

        return redirect()->route('dashboard.archeticture.index');
        //
    }

    public function trashed()
    {

        $Archetictures = Archeticture::onlyTrashed()->paginate();

        return view('dashboard.archeticture.trashed', compact('Archetictures'));
    }

    public function showTrashed($id)
    {
        
        $Archeticture = Archeticture::withTrashed()->findorfail($id);

        return view('dashboard.archeticture.show', compact('Archeticture'));
    }

    public function restore($id)
    {
        $Archeticture =  Archeticture::withTrashed()->findorfail($id);
        $Archeticture->restore();
        flash()->success(trans('Archeticture.messages.restored'));
        return redirect()->route('dashboard.archeticture.trashed');
    }

    public function forceDelete($id)
    {
        $Archeticture =  Archeticture::withTrashed()->findorfail($id);

        $Archeticture->forceDelete();

        flash()->success(trans('Archeticture.messages.deleted'));

        return redirect()->route('dashboard.archeticture.trashed');
    }
}
