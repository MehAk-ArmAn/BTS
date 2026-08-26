<?php

namespace App\Services;

use App\Models\Bt21Character;
use App\Models\BtsUpdate;
use App\Models\LearningMaterial;
use App\Models\MediaItem;
use App\Models\QuizGame;
use App\Models\Quote;
use App\Models\SongImage;
use App\Models\TimelineEvent;
use Illuminate\Database\Eloquent\Model;

class BangTanNotificationCatalog
{
    public function for(Model $model): ?array
    {
        $baseData = [
            'id' => (string) $model->getKey(),
            'slug' => (string) ($model->getAttribute('slug') ?? ''),
        ];

        return match (true) {
            $model instanceof QuizGame => [
                'title' => 'ARMY, quiz just dropped 👀💜',
                'body' => 'New quiz is live. Think you can ace it?',
                'data' => $baseData + [
                    'type' => 'quiz',
                ],
            ],

            $model instanceof LearningMaterial => [
                'title' => 'New BangTan lore unlocked 📚💜',
                'body' => 'A fresh learning lesson is live. Time to level up your ARMY knowledge.',
                'data' => $baseData + [
                    'type' => 'learning',
                ],
            ],

            $model instanceof BtsUpdate => [
                'title' => 'ARMY ALERT 👀💜',
                'body' => 'There’s a new BangTan update waiting for you.',
                'data' => $baseData + [
                    'type' => 'update',
                ],
            ],

            $model instanceof MediaItem => [
                'title' => 'New pics in the Purple Universe 📸💜',
                'body' => 'Fresh gallery content just landed on BangTan.',
                'data' => $baseData + [
                    'type' => 'gallery',
                ],
            ],

            $model instanceof Quote => [
                'title' => 'New BTS quote unlocked 💬💜',
                'body' => 'A fresh quote just landed in BangTan.',
                'data' => $baseData + [
                    'type' => 'quote',
                ],
            ],

            $model instanceof Bt21Character => [
                'title' => 'BT21 update incoming 🫶💜',
                'body' => 'Something new just joined the BT21 corner.',
                'data' => $baseData + [
                    'type' => 'bt21',
                ],
            ],

            $model instanceof TimelineEvent => [
                'title' => 'Timeline update just dropped 🕰️💜',
                'body' => 'A new BTS moment was added to the BangTan timeline.',
                'data' => $baseData + [
                    'type' => 'timeline',
                ],
            ],

            $model instanceof SongImage => [
                'title' => 'Music corner update 🎧💜',
                'body' => 'Something new was added to BangTan’s song collection.',
                'data' => $baseData + [
                    'type' => 'song',
                ],
            ],

            default => null,
        };
    }
}
