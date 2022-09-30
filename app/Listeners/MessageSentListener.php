<?php

namespace App\Listeners;

use App\Broadcasting\PusherChannel;
use App\Models\ChatRoomMembers;
use App\Models\Notification as NotificationModel;
use App\Notifications\CustomNotification;
use App\Support\Chat\Events\MessageSent;
use App\Models\User;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Notification;

class MessageSentListener
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle(MessageSent $event)
    {
        $event->message->room->roomMembers()
            ->where('member_id', '!=', $event->message->sender_id)
            ->each(function (ChatRoomMembers $member) use ($event) {
                $user = $member->member;
                if (! $user->isSubscribedTo("room.{$event->message->room_id}")) {
                    Notification::send($user, new CustomNotification([
                        'via' => ['database', PusherChannel::class],
                        'database' => [
                            'trans' => $event->message->message,
                            'room_id' => $event->message->room_id,
                            'type' => NotificationModel::CHAT,
                            'id' => $event->message->room_id,
                        ],
                        'fcm' => [
                            'title' => 'khabir',
                            'body' => trans('notifications.new_chat_message', [
                                'room' => $event->message->room_id,
                            ]),
                            'type' => NotificationModel::CHAT,
                            'data' => [
                                'id' => $event->message->room_id,
                            ],
                        ],
                    ]));
                }
            });
    }
}
