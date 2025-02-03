<?php

namespace App\Domain\Notification\Application;

use Google\Auth\ApplicationDefaultCredentials;
use GuzzleHttp\Client;
use GuzzleHttp\HandlerStack;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;

class NotificationService
{
    public static function sendNotificationTopic($topic, $title, $body, $category = 'COUPON', $screen = 'Coupon', $data = '', $picture = null)
    {
        putenv('GOOGLE_APPLICATION_CREDENTIALS=' . Storage::path('joycal-firebase-adminsdk-of5j1-e0e6a4b03e.json'));
        $scopes     = ['https://www.googleapis.com/auth/firebase.messaging'];

        $data       = [
            "message" => [
                "topic"         => $topic,
                "notification"  => [
                    "title"     => $title,
                    "body"      => $body,
                ],
                "data"          => [
                    'screen'    => $screen,
                    'category'  => $category,
                    'data'      => $data,
                    'picture'   => $picture,
                ],
            ],
        ];

        $headers = [
            'Accept'        => 'application/json',
            'Content-Type'  => 'application/json',
        ];

        $middleware     = ApplicationDefaultCredentials::getMiddleware($scopes);
        $stack          = HandlerStack::create();
        $stack->push($middleware);

        $client     = new Client([
            'handler'   => $stack,
            'base_uri'  => 'https://fcm.googleapis.com',
            'auth'      => 'google_auth'
        ]);

        return Http::withHeaders($headers)->bodyFormat("json")->setClient($client)
            ->post('https://fcm.googleapis.com/v1/projects/joycal/messages:send', $data);
    }

    public static function sendNotificationSingle($fcmToken, $title, $body, $category = 'BOOKING', $screen = 'Reservation', $data = '', $picture = null)
    {
        putenv('GOOGLE_APPLICATION_CREDENTIALS=' . Storage::path('joycal-966a5152a07e.json'));
        $scopes     = ['https://www.googleapis.com/auth/firebase.messaging'];

        $data       = [
            "message" => [
                "token"         => $fcmToken,
                "data"          => [
                    'screen'    => $screen,
                    'category'  => $category,
                    'data'      => $data,
                    'android'   => 'https://play.google.com/store/apps/details?id=id.sumroch.reminder',
                    'ios'       => 'https://itunes.apple.com/id/app/acari/id1446237784?mt=8',
                    'picture'   => $picture,
                    "title"     => $title,
                    "body"      => $body,
                ],
                "notification"  => [
                    "title"     => $title,
                    "body"      => $body,
                ],
            ],
        ];

        $headers = [
            'Accept'        => 'application/json',
            'Content-Type'  => 'application/json',
        ];

        $middleware     = ApplicationDefaultCredentials::getMiddleware($scopes);
        $stack          = HandlerStack::create();
        $stack->push($middleware);

        $client     = new Client([
            'handler'   => $stack,
            'base_uri'  => 'https://fcm.googleapis.com',
            'auth'      => 'google_auth'
        ]);

        return Http::withHeaders($headers)->bodyFormat("json")->setClient($client)
            ->post('https://fcm.googleapis.com/v1/projects/joycal/messages:send', $data);
    }
}
