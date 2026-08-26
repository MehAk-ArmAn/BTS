<?php

namespace App\Services;

use Google\Auth\Credentials\ServiceAccountCredentials;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Throwable;

class FirebasePushService
{
    private const SCOPE =
        'https://www.googleapis.com/auth/firebase.messaging';

    public function sendTopic(
        string $title,
        string $body,
        array $data = [],
        ?string $topic = null,
        ?string $image = null,
    ): bool {
        try {
            $projectId = (string) config('firebase.project_id');
            $credentialsPath = (string) config('firebase.credentials');
            $topic ??= (string) config('firebase.topic');

            if (
                $projectId === '' ||
                $credentialsPath === '' ||
                $topic === ''
            ) {
                Log::warning('BangTan Firebase configuration is incomplete.');
                return false;
            }

            if (! is_file($credentialsPath)) {
                Log::warning('BangTan Firebase credentials file was not found.');
                return false;
            }

            $credentials = new ServiceAccountCredentials(
                self::SCOPE,
                $credentialsPath,
            );

            $auth = $credentials->fetchAuthToken();
            $accessToken = $auth['access_token'] ?? null;

            if (! is_string($accessToken) || $accessToken === '') {
                Log::warning('BangTan could not obtain Firebase access token.');
                return false;
            }

            $cleanData = [];

            foreach ($data as $key => $value) {
                if ($value !== null) {
                    $cleanData[(string) $key] = (string) $value;
                }
            }

            $notification = [
                'title' => $title,
                'body' => $body,
            ];

            $androidNotification = [
                'channel_id' => config(
                    'firebase.channel_id',
                    'bangtan_updates',
                ),
                'sound' => 'default',
            ];

            $apns = [
                'payload' => [
                    'aps' => [
                        'sound' => 'default',
                    ],
                ],
            ];

            if (is_string($image) && trim($image) !== '') {
                $image = trim($image);

                $notification['image'] = $image;
                $androidNotification['image'] = $image;

                $apns['payload']['aps']['mutable-content'] = 1;
                $apns['fcm_options'] = [
                    'image' => $image,
                ];
            }

            $response = Http::withToken($accessToken)
                ->acceptJson()
                ->asJson()
                ->connectTimeout(5)
                ->timeout(10)
                ->post(
                    "https://fcm.googleapis.com/v1/projects/{$projectId}/messages:send",
                    [
                        'message' => [
                            'topic' => $topic,

                            'notification' => $notification,

                            'data' => $cleanData,

                            'android' => [
                                'priority' => 'high',
                                'ttl' => '86400s',
                                'notification' => $androidNotification,
                            ],

                            'apns' => $apns,
                        ],
                    ],
                );

            if (! $response->successful()) {
                Log::warning(
                    'BangTan Firebase notification failed.',
                    [
                        'status' => $response->status(),
                        'response' => $response->body(),
                    ],
                );

                return false;
            }

            return true;
        } catch (Throwable $error) {
            // Firebase must NEVER stop BangTan content from publishing.
            Log::warning(
                'BangTan Firebase notification exception.',
                ['error' => $error->getMessage()],
            );

            return false;
        }
    }
}
