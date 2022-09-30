<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\Chat\MessageResource;
use App\Http\Resources\Chat\RoomResource;
use App\Http\Resources\Chat\UserResource;
use App\Http\Resources\MiniEstateResource;
use App\Http\Resources\MiniOrderResource;
use App\Models\Order;
use App\Models\ChatRoom;
use App\Models\User;
use App\Models\Estate;
use App\Support\Chat\ChatManager;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use App\Models\Block;

class ChatController extends Controller
{
    protected $chat;

    public function __construct(ChatManager $chatManager)
    {
        $this->chat = $chatManager;
        $this->middleware('auth:sanctum');

    }

    public function rooms()
    {
        $this->chat->setUser(auth()->user());

        return RoomResource::collection(
            $this->chat->getRooms()
        );
        
    }

    public function getRoomByUser($userId , Request $request)
    {
        
        $order_id = 0;
        $estate_id = 0;
         if($userId == auth()->user()->id)
         {
            return response()->json([
                'message' => trans('block.messages.not'),
            ],404);
         }
         else
        if($request->type == "order")
        {
            $order_id = $request->chat_id;
        }
        else
        $estate_id = $request->chat_id;
        $Block= Block::where('user_id',auth()->user()->id)->where('block_id',$userId)
        ->orwhere('block_id',auth()->user()->id)->where('user_id',$userId)
        ->first();
        if($Block != null)
        {
            return response()->json([
                'message' => trans('block.messages.ready'),
            ]);
        }
        else

        $user = User::findOrFail($userId);
        $room = $this->chat->setUser(auth()->user())->getRoomWith($user, ChatRoom::PRIVATE_ROOM ,$estate_id,$order_id,$request->type);

        $this->chat->markAsRead($room);

//        return response()->json($room);
        return $this->getRoomMessages($room);
    }

    public function sendMessage(Request $request, ChatRoom $room)
    {


        $request->validate([
            'message' => 'nullable',
            'image' => 'nullable|image',
        ]);

        $message = $this->chat->setUser(auth()->user())
            ->sendMessage($room, $request->input('message'), $request->file('image'));

        return new MessageResource($message);
    }

    public function getRoomMessages(ChatRoom $room)
    {
        return MessageResource::collection(
            $room->refresh()->messages()->latest()->simplePaginate()
        )->additional([
            'room' => new RoomResource($room),
        ]);
    }
    public function getUnreadRooms()
    {
        $unreadRooms =  auth()->user()->roomsMember()
            ->whereHas('room.lastMessage', function (Builder $builder) {
               $builder->whereColumn('last_read_message_id', '<', 'chat_room_messages.id');
            })->count();

        return response()->json([
            'unread_rooms' => $unreadRooms,
        ]);
    }

    public function getRoom($roomId)
    {
        $room = ChatRoom::findOrFail($roomId);
        $type_chat=  $room->type_chat;
        $this->chat->setUser(auth()->user())->markAsRead($room);
        if($room->estate_id != null)
        {
            $Estate =  Estate::find($room->estate_id);
            if($Estate !=null )
            {
                $Estate =  new MiniEstateResource ($Estate) ;
                return $this->getRoomMessages($room)->additional(compact('Estate','type_chat'));
            }
         else

         return $this->getRoomMessages($room)->additional(compact('type_chat'));

        
         
        }
        else
        {
            $Order =   Order::find($room->order_id);
            if($Order!=null )
            {
                $Order =  new MiniOrderResource (Order::find($room->order_id)) ;

                return $this->getRoomMessages($room)->additional(compact('Order','type_chat'));
            }
            else
            return $this->getRoomMessages($room)->additional(compact('type_chat'));

          
        }
       
    }

}
