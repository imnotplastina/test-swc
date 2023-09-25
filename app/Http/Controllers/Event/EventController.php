<?php

namespace App\Http\Controllers\Event;

use App\Actions\SubscribeUser;
use App\Http\Controllers\Controller;
use App\Http\Requests\Event\SubscribeEventRequest;
use App\Models\Event;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class EventController extends Controller
{
    public function index(): View
    {
        $events = Event::query()
            ->get();

        return view('event.index', compact('events'));
    }

    public function show(Event $event): View
    {
        $events = Event::query()
            ->get();

        return view('event.show', compact('event', 'events'));
    }

    public function subscribe(SubscribeEventRequest $request, SubscribeUser $action): RedirectResponse
    {
        $subscriber = $request->validated();

        $action->subscribe($subscriber);

        return redirect()->back();
    }

    public function unSubscribe(SubscribeEventRequest $request, SubscribeUser $action): RedirectResponse
    {
        $subscriber = $request->validated();

        $action->unSubscribe($subscriber);

        return redirect()->back();
    }
}
