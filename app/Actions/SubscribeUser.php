<?php

namespace App\Actions;

use App\Models\Event;
use App\Models\User;

final class SubscribeUser
{
    public function subscribe(mixed $subscriber): void
    {
        $user = User::query()
            ->findOrFail($subscriber['user_id']);

        $event = Event::findOrFail($subscriber['event_id']);

        $event->users()->attach($user);
    }

    public function unSubscribe(mixed $subscriber): void
    {
        $user = User::query()
            ->findOrFail($subscriber['user_id']);

        $event = Event::findOrFail($subscriber['event_id']);

        $event->users()->detach($user);
    }
}
