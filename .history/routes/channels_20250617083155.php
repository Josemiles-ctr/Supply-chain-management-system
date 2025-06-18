<?php

use Illuminate\Support\Facades\Broadcast;

Broadcast::channel('chat.{$receiver_id}', function ($user, $receid) {
    return (int) $user->id === (int) $id;
});