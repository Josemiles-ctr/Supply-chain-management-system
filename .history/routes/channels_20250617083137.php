<?php

use Illuminate\Support\Facades\Broadcast;

Broadcast::channel('chat.{$receiver_}', function ($user, $id) {
    return (int) $user->id === (int) $id;
});