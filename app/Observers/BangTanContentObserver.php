<?php

namespace App\Observers;

use App\Services\BangTanNotificationCatalog;
use App\Services\FirebasePushService;
use Illuminate\Contracts\Events\ShouldHandleEventsAfterCommit;
use Illuminate\Database\Eloquent\Model;

class BangTanContentObserver implements ShouldHandleEventsAfterCommit
{
    public function __construct(
        private readonly BangTanNotificationCatalog $catalog,
        private readonly FirebasePushService $push,
    ) {
    }

    public function created(Model $model): void
    {
        // Never blast real users while seeding, migrating or using Tinker.
        if (app()->runningInConsole()) {
            return;
        }

        $notification = $this->catalog->for($model);

        if ($notification === null) {
            return;
        }

        $this->push->sendTopic(
            $notification['title'],
            $notification['body'],
            $notification['data'],
        );
    }
}
