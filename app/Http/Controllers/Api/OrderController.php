<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\Api\OrderRequest;
use App\Http\Resources\OrderResource;
use App\Http\Resources\SelectResource;
use App\Models\Order;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller;
use Illuminate\Http\Request;
use App\Models\OfficeOwner;

use App\Broadcasting\PusherChannel;
use App\Models\Notification as NotificationModel;
use App\Notifications\CustomNotification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Notification;

class OrderController extends Controller
{
    use AuthorizesRequests, ValidatesRequests;

    public function __construct()
    {
        $this->middleware('auth:sanctum')->only('store', 'getMyOrders','update');
    }

    /**
     * Display a listing of the orders.
     *
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function index()
    {
        
        $orders = Order::filter()->latest('published_at')->simplePaginate();
        return OrderResource::collection($orders);
    }

    
    /**
     * Display a listing of the orders.
     *
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function getMyOrders()
    {
        $orders = auth()->user()->orders()->filter()->latest('published_at')->simplePaginate();
        return OrderResource::collection($orders);
    }

    public function store(OrderRequest $request)
    {
             $order = $request->user()
            ->orders()
            ->create($request->all());
            $OfficeOwner = OfficeOwner::where('city_id',$request->city_id)->get();
            $this->sendnotfation($OfficeOwner,$order);
            return new OrderResource($order);
    }

    /**
     * Display the specified order.
     *
     * @param \App\Models\Order $order
     * @return \App\Http\Resources\OrderResource
     */
    public function show(Order $order)
    {
        return new OrderResource($order);
    }


    public function update(OrderRequest $request, $id)
    {
        $order  = Order::findorfail($id);
        $order->update($request->all());
        return new OrderResource($order);
        //
    }

    /**
     * Republish the specified order.
     *
     * @param \App\Models\Order $order
     * @return \App\Http\Resources\OrderResource
     */
    public function republish(Order $order)
    {
        $this->authorize('republish', $order);

        $order->forceFill(['published_at' => now()])->save();

        return new OrderResource($order);
    }

    /**
     * Lock Or Unlock the given estate.
     *
     * @return \App\Http\Resources\OrderResource
     */
    public function toggleLock(Order $order)
    {
        $this->authorize('lock', $order);

        if ($order->locked()) {
            $order->markAsUnLocked();
        } else {
            $order->markAsLocked();
        }

        return new OrderResource($order);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function select()
    {
        $orders = Order::filter()->latest('published_at')->simplePaginate();

        return SelectResource::collection($orders);
    }


    public function sendnotfation($OfficeOwner,$order)
    {
        foreach($OfficeOwner as $item)
        {
            $user = OfficeOwner::find($item->id);
            Notification::send($user, new CustomNotification([
                'via' => ['database', PusherChannel::class],
                'database' => [
                    'trans' => 'new order near',
                    'type' => NotificationModel::neworder,
                    'order_id' => $order->id ,
                    'user_id' => $user->id ,

                ],
                'fcm' => [
                    'title' => 'khabir',
                    'body' =>'new order near' ,
                    'type' => NotificationModel::neworder,
                    'data' => [
                        'id' => $order->id ,
                    ],
                ],
            ]));
         
        }

    }
}
