<?php

use Illuminate\Support\Facades\Broadcast;

Broadcast::channel('chat.', function ($user, $id) {
    return (int) $user->id === (int) $id;
});