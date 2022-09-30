<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\OfficeOwner;
use App\Models\Office;
use App\Models\City;
use Carbon\Carbon;
use App\Models\Setting;
use Laraeast\LaravelSettings\Facades\Settings;

use Illuminate\Routing\Controller;
use App\Http\Requests\Dashboard\OfficeOwnerRequest;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Builder;
use App\Models\User;
use App\Broadcasting\PusherChannel;
use App\Models\Notification as NotificationModel;
use App\Notifications\CustomNotification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Notification;
class OfficeOwnerController extends Controller
{
    use AuthorizesRequests;
    use ValidatesRequests;

    /**
     * OfficeOwnerController constructor.
     */
    public function __construct()
    {
        $this->authorizeResource(OfficeOwner::class, 'office_owner');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $officeOwners = OfficeOwner::filter()->paginate();

        return view('dashboard.accounts.office_owners.index', compact('officeOwners'));
    }


    public function officenotactive()
    {   
        $officeOwners = OfficeOwner::filter()->whereHas('office',function (Builder $query) {
          $query->where('active_at',null);
        })->paginate();
        return view('dashboard.accounts.office_owners.officenotactive', compact('officeOwners'));

    }

    public function officeactive()
    {   
        $officeOwners = OfficeOwner::filter()->whereHas('office',function (Builder $query) {
          $query->where('active_at','!=',null);
        })->paginate();
        return view('dashboard.accounts.office_owners.officeactive', compact('officeOwners'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cities = City::get();
        return view('dashboard.accounts.office_owners.create', compact('cities'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(OfficeOwnerRequest $request)
    {
        DB::beginTransaction();
        $officeOwner = new OfficeOwner();

        $officeOwner->fill($request->allWithHashedPassword())->save();

        $officeOwner->setType($request->type);

        $officeOwner->addAllMediaFromTokens(null, 'avatars');
        $officeOwner->addAllMediaFromTokens(null, 'RequsetDischarges');

        $office = $officeOwner->office()->create($request->prefixedWith('office_'));

        $office->mergeFillable([
            'certified_at',
            'classified_at',
        ]);

        $office->forceFill([
            'certified_at' => $request->boolean('certified_at'),
            'classified_at' => $request->boolean('classified_at'),
        ]);

        $officeOwner->office->addAllMediaFromTokens(null, 'office_commercial_register');
        $officeOwner->office->addAllMediaFromTokens(null, 'office_classification_certificate');
        DB::commit();

        flash()->success(trans('office_owners.messages.created'));

        return redirect()->route('dashboard.office-owners.show', $officeOwner);
    }

    /**
     * Display the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function show(OfficeOwner $officeOwner)
    {
        $count_Sponsors =  $officeOwner->RequsetSponsors()->whereMonth('created_at', Carbon::now()->month)->count();
        $count_setting  =  Settings::get('count');
        return view('dashboard.accounts.office_owners.show', compact('officeOwner','count_Sponsors','count_setting'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function edit(OfficeOwner $officeOwner)
    {
        $cities = City::get();

        return view('dashboard.accounts.office_owners.edit', compact('officeOwner','cities'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(OfficeOwnerRequest $request, OfficeOwner $officeOwner)
    {
        $officeOwner->office->mergeFillable([
            'certified_at',
            'classified_at',
        ]);

        $data = $request->allWithHashedPassword();

        $data['certified_at'] = $request->boolean('certified_at');
        $data['classified_at'] = $request->boolean('classified_at');

        $officeOwner->update($data);

        $officeOwner->setType($request->type);

        $officeOwner->addAllMediaFromTokens(null, 'avatars');
        $officeOwner->addAllMediaFromTokens(null, 'RequsetDischarges');

        $officeOwner->office->update($request->prefixedWith('office_'));

        $officeOwner->office->addAllMediaFromTokens(null, 'office_commercial_register');
        $officeOwner->office->addAllMediaFromTokens(null, 'office_classification_certificate->$this->office');

        
        flash()->success(trans('office_owners.messages.updated'));

        return redirect()->route('dashboard.office-owners.show', $officeOwner);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @throws \Exception
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(OfficeOwner $officeOwner)
    {
        $officeOwner->delete();

        flash()->success(trans('office_owners.messages.deleted'));

        return redirect()->route('dashboard.office-owners.index');
    }

    /**
     * Display a listing of the trashed resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function trashed()
    {
        $this->authorize('viewAnyTrash', OfficeOwner::class);
        $officeOwners = OfficeOwner::onlyTrashed()->paginate();
        return view('dashboard.accounts.office_owners.trashed', compact('officeOwners'));
    }

    /**
     * Display the specified trashed resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function showTrashed(OfficeOwner $officeOwner)
    {
        $this->authorize('viewTrash', $officeOwner);

        return view('dashboard.accounts.office-owners.show', compact('officeOwner'));
    }

    /**
     * Restore the trashed resource.
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function restore(OfficeOwner $officeOwner)
    {
        $this->authorize('restore', $officeOwner);

        $officeOwner->restore();

        flash()->success(trans('office_owners.messages.restored'));

        return redirect()->route('dashboard.office-owners.trashed');
    }

    /**
     * Force delete the specified resource from storage.
     *
     * @throws \Exception
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function forceDelete(OfficeOwner $officeOwner)
    {
        $this->authorize('forceDelete', $officeOwner);

        $officeOwner->forceDelete();

        flash()->success(trans('office_owners.messages.deleted'));

        return redirect()->route('dashboard.office-owners.trashed');
    }

    public function active($id)
    {
        DB::table('users')->where('id', $id)
        ->update(['phone_verified_at' => now()]);
        flash()->success('تم بنجاح');
        return redirect()->back();
    }


    public function disactive($id)
    {
        DB::table('users')->where('id', $id)
        ->update(['phone_verified_at' => null]);
        flash()->success('تم بنجاح');
        return redirect()->back();
    }

    public function accept($id)
    {
        $Office = Office::where('user_id',$id)->firstorfail();
        $Office->active_at = now();
        $Office->save();
       // $this->sendnotfation($id);
        flash()->success('تم بنجاح');
        return redirect()->back();
    }

    public function refusal($id)
    {
        $Office = Office::where('user_id',$id)->firstorfail();
        $Office->active_at = null;
        $Office->save();
      //  $this->sendnotfation($id);
        flash()->success('تم بنجاح');
        return redirect()->back();
    }


    public function certified($id)
    {
        $Office = Office::where('id',$id)->firstorfail();
        $Office->certified_at = now();
        $Office->save();
        flash()->success('تم بنجاح');
        return redirect()->back();

    }

    public function classified($id)
    {
        $Office = Office::where('id',$id)->firstorfail();
        $Office->classified_at = now();
        $Office->save();
        flash()->success('تم بنجاح');
        return redirect()->back();

    }


    public function sendnotfation($id)
    {
        $user = User::find($id);
        Notification::send($user, new CustomNotification([
            'via' => ['database', PusherChannel::class],
            'database' => [
                'trans' => 'active account',
                'type' => NotificationModel::active,
                'user_id' => $user->id ,
            ],
            'fcm' => [
                'title' => 'khabir',
                'body' =>'active account is done' ,
                'type' => NotificationModel::active,
                'data' => [
                    'id' => $user->id ,
                ],
            ],
        ]));

    }
}
