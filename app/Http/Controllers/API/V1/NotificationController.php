<?php

namespace App\Http\Controllers\API\V1;

use App\Domain\Notification\Application\NotificationService;
use App\Domain\Order\Validators\NotificationSingleRequest;
use App\Http\Controllers\Controller;

class NotificationController extends Controller
{
    public function sendSingle(NotificationSingleRequest $request)
    {
        return NotificationService::sendNotificationSingle($request->token, $request->title, $request->body, $request->category, $request->screen, $request->data, $request->picture);
    }

    public function sendTopic(NotificationSingleRequest $request)
    {
        return NotificationService::sendNotificationTopic($request->topic, $request->title, $request->body, $request->category, $request->screen, $request->data, $request->picture);
    }
}
