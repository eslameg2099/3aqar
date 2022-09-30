<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateChatRoomMessagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('chat_room_messages', function (Blueprint $table) {
            $table->id();
            $table->foreignId('room_id');
            $table->foreign('room_id')->references('id')->on('chat_rooms')->cascadeOnDelete();
            $table->foreignId('sender_id');
            $table->foreign('sender_id')->references('id')->on('users')->cascadeOnDelete();
            $table->text('message')->nullable();
            $table->timestamps();
        });
        Schema::table('chat_room_members', function (Blueprint $table) {
            $table->foreignId('last_read_message_id')->nullable()->after('member_id');
            $table->foreign('last_read_message_id')
                ->references('id')
                ->on('chat_room_messages')
                ->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('chat_room_messages');
    }
}
