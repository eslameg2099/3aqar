<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Estate;
use Illuminate\Routing\Controller;
use App\Http\Requests\Dashboard\EstateRequest;
use App\Http\Requests\Dashboard\SponsorRequest;
use App\Models\CustomField;
use App\Models\FieldValue;

use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use App\Models\City;
use App\Models\User;
use App\Models\Type;
use Illuminate\Http\Request;
use App\Models\RequsetSponsor;

class EstateController extends Controller
{
    use AuthorizesRequests, ValidatesRequests;

    /**
     * EstateController constructor.
     */
    public function __construct()
    {
        $this->authorizeResource(Estate::class, 'estate');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $estates = Estate::orderBy('id', 'DESC')->with('user')->filter()->paginate();
        return view('dashboard.estates.index', compact('estates'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $Users  = User::get();
        $types = Type::get();
        return view('dashboard.estates.create',compact('types','Users'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \App\Http\Requests\Dashboard\EstateRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(EstateRequest $request)
    {
        $estate = Estate::create($request->all());
        $estate->addCustomFields($request->input('fields'));
        $estate->addAllMediaFromTokens();

        flash()->success(trans('estates.messages.created'));

        return redirect()->route('dashboard.estates.show', $estate);
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Estate $estate
     * @return \Illuminate\Http\Response
     */
    public function show(Estate $estate)
    {
       $fields= $estate->fieldValues->map(function (FieldValue $value) {
            return [
                'key' => $value->field->name,
                'value' => $this->getFieldValue($value),
                'check' => $value->type == CustomField::SWITCH_TYPE ? (bool) $value->value : null,
            ];
            
        })->toArray();

        return view('dashboard.estates.show', compact('estate','fields'));
    }

    public function getFieldValue($value)
    {
        if ($value->type == CustomField::SWITCH_TYPE) {
            return null;
        }

        if($value->type == "buttons")
        {
            return (string) (optional($value->option)->name);
        }
        else
        return (string) ($value->value);
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Estate $estate
     * @return \Illuminate\Http\Response
     */
    public function edit(Estate $estate)
    {
        $Users  = User::get();
        $types = Type::get();
        $cities = City::get();
        return view('dashboard.estates.edit', compact('estate','Users','cities','types'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \App\Http\Requests\Dashboard\EstateRequest $request
     * @param \App\Models\Estate $estate
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(EstateRequest $request, Estate $estate)
    {
        $estate->update($request->all());

        $estate->addAllMediaFromTokens();

        flash()->success(trans('estates.messages.updated'));

        return redirect()->route('dashboard.estates.show', $estate);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Estate $estate
     * @throws \Exception
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Estate $estate)
    {
        $estate->delete();

        flash()->success(trans('estates.messages.deleted'));

        return redirect()->route('dashboard.estates.index');
    }

    /**
     * Display a listing of the trashed resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function trashed()
    {

        $estates = Estate::onlyTrashed()->paginate();

        return view('dashboard.estates.trashed', compact('estates'));
    }

    /**
     * Display the specified trashed resource.
     *
     * @param \App\Models\Estate $estate
     * @return \Illuminate\Http\Response
     */
    public function showTrashed(Estate $estate)
    {

        return view('dashboard.estates.show', compact('estate'));
    }

    /**
     * Restore the trashed resource.
     *
     * @param \App\Models\Estate $estate
     * @return \Illuminate\Http\RedirectResponse
     */
    public function restore(Estate $estate)
    {

        $estate->restore();

        flash()->success(trans('estates.messages.restored'));

        return redirect()->route('dashboard.estates.trashed');
    }

    /**
     * Force delete the specified resource from storage.
     *
     * @param \App\Models\Estate $estate
     * @throws \Exception
     * @return \Illuminate\Http\RedirectResponse
     */
    public function forceDelete(Estate $estate)
    {

        $estate->forceDelete();

        flash()->success(trans('estates.messages.deleted'));

        return redirect()->route('dashboard.estates.trashed');
    }

    public function sponser($id)
    {
        $estate = Estate::findorfail($id);
        return view('dashboard.estates.sponser', compact('estate'));

    }


    public function makesponser(SponsorRequest $Request)
    {
        $estate = Estate::findorfail($Request->id);
        $RequsetSponsor = new RequsetSponsor();
        $RequsetSponsor->user_id  = $estate->user_id;
        $RequsetSponsor->estate_id  = $estate->id;
        $RequsetSponsor->type = $Request->type;
        $RequsetSponsor->stauts = 'current';
        $RequsetSponsor->active = '1';
        $RequsetSponsor->sponser_at = $Request->date;
        $RequsetSponsor->save();
        $RequsetSponsor->addAllMediaFromTokens();
        flash()->success(trans('estates.messages.created'));
        return redirect()->route('dashboard.estates.index');

    }
}
