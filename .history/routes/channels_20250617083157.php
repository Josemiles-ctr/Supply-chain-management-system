<?php

use Illuminate\Support\Facades\Broadcast;

Broadcast::channel('chat.{$receiver_id}', function ($user, $receiverid) {
    return (int) $user->id === (int) $id;
});