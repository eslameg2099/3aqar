<?php

namespace App\Http\Controllers\Dashboard;
use App\Models\City;

use App\Models\EngineeringOffice;
use Illuminate\Routing\Controller;
use App\Http\Requests\Dashboard\EngineeringOfficeRequest;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\DB;

class EngineeringOfficeController extends Controller
{
    use AuthorizesRequests;
    use ValidatesRequests;

    /**
     * CityController constructor.
     */
    public function __construct()
    {
        $this->authorizeResource(EngineeringOffice::class, 'engineering_office');
    }
   
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $engineering_offices = EngineeringOffice::orderBy('id', 'DESC')->filter()->paginate();

        return view('dashboard.engineering_offices.index', compact('engineering_offices'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.engineering_offices.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \App\Http\Requests\Dashboard\EngineeringOfficeRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(EngineeringOfficeRequest $request)
    {
        $engineering_office = EngineeringOffice::create($request->all());

        $engineering_office->addAllMediaFromTokens();

        flash()->success(trans('engineering_offices.messages.created'));

        return redirect()->route('dashboard.engineering_offices.show', $engineering_office);
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\EngineeringOffice $engineering_office
     * @return \Illuminate\Http\Response
     */
    public function show(EngineeringOffice $engineering_office)
    {
        return view('dashboard.engineering_offices.show', compact('engineering_office'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\EngineeringOffice $engineering_office
     * @return \Illuminate\Http\Response
     */
    public function edit(EngineeringOffice $engineering_office)
    {
        $cities = City::get();

        return view('dashboard.engineering_offices.edit', compact('engineering_office','cities'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \App\Http\Requests\Dashboard\EngineeringOfficeRequest $request
     * @param \App\Models\EngineeringOffice $engineering_office
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(EngineeringOfficeRequest $request, EngineeringOffice $engineering_office)
    {
        $engineering_office->update($request->all());

        $engineering_office->addAllMediaFromTokens();

        flash()->success(trans('engineering_offices.messages.updated'));

        return redirect()->route('dashboard.engineering_offices.show', $engineering_office);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\EngineeringOffice $engineering_office
     * @throws \Exception
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(EngineeringOffice $engineering_office)
    {
        $engineering_office->delete();

        flash()->success(trans('engineering_offices.messages.deleted'));

        return redirect()->route('dashboard.engineering_offices.index');
    }

    /**
     * Display a listing of the trashed resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function trashed()
    {
        $this->authorize('viewAnyTrash', EngineeringOffice::class);

        $engineering_offices = EngineeringOffice::onlyTrashed()->paginate();

        return view('dashboard.engineering_offices.trashed', compact('engineering_offices'));
    }

    /**
     * Display the specified trashed resource.
     *
     * @param \App\Models\EngineeringOffice $engineering_office
     * @return \Illuminate\Http\Response
     */
    public function showTrashed(EngineeringOffice $engineering_office)
    {
        $this->authorize('viewTrash', $engineering_office);

        return view('dashboard.engineering_offices.show', compact('engineering_office'));
    }

    /**
     * Restore the trashed resource.
     *
     * @param \App\Models\EngineeringOffice $engineering_office
     * @return \Illuminate\Http\RedirectResponse
     */
    public function restore(EngineeringOffice $engineering_office)
    {
        $this->authorize('restore', $engineering_office);

        $engineering_office->restore();

        flash()->success(trans('engineering_offices.messages.restored'));

        return redirect()->route('dashboard.engineering_offices.trashed');
    }

    /**
     * Force delete the specified resource from storage.
     *
     * @param \App\Models\EngineeringOffice $engineering_office
     * @throws \Exception
     * @return \Illuminate\Http\RedirectResponse
     */
    public function forceDelete(EngineeringOffice $engineering_office)
    {
        $this->authorize('forceDelete', $engineering_office);

        $engineering_office->forceDelete();

        flash()->success(trans('engineering_offices.messages.deleted'));

        return redirect()->route('dashboard.engineering_offices.trashed');
    }

    public function active($id)
    {
        DB::table('engineering_offices')->where('id', $id)
        ->update(['stauts' => '1']);
        flash()->success('تم بنجاح');
        return redirect()->back();
    }
}
