<?php

namespace App\Http\Controllers;

use App\Models\{Pray, User};
use App\Notifications\PushDemo;
use Illuminate\Http\{JsonResponse, Request, Response};
use Illuminate\Support\Facades\{Auth, Notification};

class PushController extends Controller
{
    /**
     * Store the PushSubscription.
     */
    public function store(Request $request): JsonResponse
    {
        $request->validate([
            'endpoint'    => 'required',
            'keys.auth'   => 'required',
            'keys.p256dh' => 'required',
        ]);
        $endpoint = $request->endpoint;
        $token    = $request->keys['auth'];
        $key      = $request->keys['p256dh'];
        $user     = Auth::user();
        $user->updatePushSubscription($endpoint, $key, $token);

        return response()->json(['success' => true], 200);
    }

    /**
     * Send Push Notifications to all users.
     */
    public function push(): Response|\Illuminate\Http\RedirectResponse
    {
        $pray = Pray::query()->select('id', 'body', 'ref')->inRandomOrder()->first();
        $user = User::query()->first();

        Notification::send($user, new PushDemo($pray->id, $pray->body, $pray->ref));

        return redirect()->back();
    }
}
