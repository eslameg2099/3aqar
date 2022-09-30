<?php

namespace App\Http\Controllers\Dashboard;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Expert;
use App\Http\Requests\Dashboard\ExpertRequest;
use Illuminate\Support\Facades\DB;

class ExpertController extends Controller
{
    use AuthorizesRequests;
    use ValidatesRequests;

    /**
     * CityController constructor.
     */
    public function __construct()
    {
        $this->authorizeResource(Expert::class, 'expert');
    }
   
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $experts = Expert::orderBy('id', 'DESC')->filter()->paginate();

        return view('dashboard.expert.index', compact('experts'));
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.expert.create');

        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ExpertRequest $request)
    {
        $Expert = Expert::create($request->all());

        $Expert->addAllMediaFromTokens();

        flash()->success(trans('experts.messages.created'));

        return redirect()->route('dashboard.experts.show', $Expert);
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Expert $expert)
    {
        return view('dashboard.expert.show', compact('expert'));

        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Expert $expert)
    {
        return view('dashboard.expert.edit', compact('expert'));

        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ExpertRequest $request,Expert $expert)
    {
      
        $expert->update($request->all());

        $expert->addAllMediaFromTokens();

        flash()->success(trans('experts.messages.updated'));

        return redirect()->route('dashboard.experts.show', $expert);
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Expert $Expert)
    {
        $Expert->delete();

        flash()->success(trans('experts.messages.deleted'));

        return redirect()->route('dashboard.experts.index');
    }

    public function trashed()
    {

        $experts = Expert::onlyTrashed()->paginate();

        return view('dashboard.expert.trashed', compact('experts'));
    }

    /**
     * Display the specified trashed resource.
     *
     * @param \App\Models\Estate $estate
     * @return \Illuminate\Http\Response
     */
    public function showTrashed($expert)
    {

        $expert =  Expert::withTrashed()->findorfail($expert);
        return view('dashboard.expert.show', compact('expert'));
    }

    /**
     * Restore the trashed resource.
     *
     * @param \App\Models\Estate $estate
     * @return \Illuminate\Http\RedirectResponse
     */
    public function restore($expert)
    {
        $expert =  Expert::withTrashed()->findorfail($expert);
        $expert->restore();
        flash()->success(trans('experts.messages.restored'));

        return redirect()->route('dashboard.experts.trashed');
    }

    /**
     * Force delete the specified resource from storage.
     *
     * @param \App\Models\Estate $estate
     * @throws \Exception
     * @return \Illuminate\Http\RedirectResponse
     */
    public function forceDelete($expert)
    {
        $expert =  Expert::withTrashed()->findorfail($expert);

        $expert->forceDelete();

        flash()->success(trans('experts.messages.deleted'));

        return redirect()->route('dashboard.experts.trashed');
    }

    public function active($id)
    {
        DB::table('experts')->where('id', $id)
        ->update(['stauts' => '1']);
        flash()->success('تم بنجاح');
        return redirect()->back();
    }
}
