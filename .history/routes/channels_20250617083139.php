<?php

use Illuminate\Support\Facades\Broadcast;

Broadcast::channel('chat.{$receiver_id}', function ($user, $id) {
    return (int) $user->id === (int) $id;
});