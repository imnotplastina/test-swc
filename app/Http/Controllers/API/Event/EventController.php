<?php

namespace App\Http\Controllers\API\Event;

use App\Actions\SubscribeUser;
use App\Http\Controllers\Controller;
use App\Http\Requests\Event\EventRequest;
use App\Http\Requests\Event\SubscribeEventRequest;
use App\Models\Event;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class EventController extends Controller
{
    public function index(): JsonResponse
    {
        $events = Event::query()
            ->get();

        return response()->json([
            'error' => null,
            'result' => $events,
        ]);
    }

    public function store(EventRequest $request): JsonResponse
    {
        $event = $request->validated();

        $event = Event::query()
            ->create($event);

        return response()->json([
            'error' => null,
            'result' => $event,
        ]);
    }

    public function destroy(Event $event): JsonResponse
    {
        try {
            if ($event->user_id !== auth()->user()->id) {
                abort(403);
            }

            $event->delete();
        } catch (\Throwable $e) {
            return response()->json([
                'error' => $e->getMessage(),
            ], 403);
        }

        return response()->json([
            'error' => null,
            'message' => "Событие удалено",
        ]);
    }

    public function subscribe(SubscribeEventRequest $request, SubscribeUser $action): JsonResponse
    {
        $subscriber = $request->validated();

        try {
            $action->subscribe($subscriber);
        } catch (\Throwable $e) {
            return response()->json([
                'error' => $e->getMessage(),
            ]);
        }

        return response()->json([
            'error' => null,
            'message' => "Вы успешно подписались на событие",
        ]);
    }

    public function unSubscribe(SubscribeEventRequest $request, SubscribeUser $action): JsonResponse
    {
        $subscriber = $request->validated();

        try {
            $action->unSubscribe($subscriber);
        } catch (\Throwable $e) {
            return response()->json([
                'error' => $e->getMessage(),
            ]);
        }

        return response()->json([
            'error' => null,
            'message' => "Вы успешно отписались от события",
        ]);
    }
}
