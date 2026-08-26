<?php

namespace App\Providers;

use App\Models\Bt21Character;
use App\Models\BtsUpdate;
use App\Models\LearningMaterial;
use App\Models\MediaItem;
use App\Models\QuizGame;
use App\Models\Quote;
use App\Models\SongImage;
use App\Models\TimelineEvent;
use App\Observers\BangTanContentObserver;
use Illuminate\Support\ServiceProvider;

class ContentNotificationServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        $models = [
            QuizGame::class,
            LearningMaterial::class,
            BtsUpdate::class,
            MediaItem::class,
            Quote::class,
            Bt21Character::class,
            TimelineEvent::class,
            SongImage::class,
        ];

        foreach ($models as $model) {
            $model::observe(BangTanContentObserver::class);
        }
    }
}
