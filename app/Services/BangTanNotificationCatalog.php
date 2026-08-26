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
                'image' => 'https://i.pinimg.com/736x/55/3b/44/553b4429936116c53f9f42fa772df946.jpg',
                'data' => $baseData + [
                    'type' => 'quiz',
                ],
            ],

            $model instanceof LearningMaterial => [
                'title' => 'New BangTan lore unlocked 📚💜',
                'body' => 'A fresh learning lesson is live. Time to level up your ARMY knowledge.',
                'image' => 'https://i.pinimg.com/736x/fc/39/fc/fc39fcfcea816cf4ec7817b83475ac8a.jpg',
                'data' => $baseData + [
                    'type' => 'learning',
                ],
            ],

            $model instanceof BtsUpdate => [
                'title' => 'ARMY ALERT 👀💜',
                'body' => 'There’s a new BangTan update waiting for you.',
                'image' => 'https://i.pinimg.com/736x/86/7c/05/867c0585ec6d266fb8e2a2c4a14c263e.jpg',
                'data' => $baseData + [
                    'type' => 'update',
                ],
            ],

            $model instanceof MediaItem => [
                'title' => 'New pics in the Purple Universe 📸💜',
                'body' => 'Fresh gallery content just landed on BangTan.',
                'image' => 'https://i.pinimg.com/736x/33/4e/f2/334ef2b21ff62fdcb7b4b5a6df44631b.jpg',
                'data' => $baseData + [
                    'type' => 'gallery',
                ],
            ],

            $model instanceof Quote => [
                'title' => 'New BTS quote unlocked 💬💜',
                'body' => 'A fresh quote just landed in BangTan.',
                'image' => 'https://i.pinimg.com/736x/75/9f/e6/759fe629b33984ae1495b392039c303a.jpg',
                'data' => $baseData + [
                    'type' => 'quote',
                ],
            ],

            $model instanceof Bt21Character => [
                'title' => 'BT21 update incoming 🫶💜',
                'body' => 'Something new just joined the BT21 corner.',
                'image' => 'https://i.pinimg.com/736x/c8/87/ff/c887ff3d61f3b2702a4557dd66d60b0c.jpg',
                'data' => $baseData + [
                    'type' => 'bt21',
                ],
            ],

            $model instanceof TimelineEvent => [
                'title' => 'Timeline update just dropped 🕰️💜',
                'body' => 'A new BTS moment was added to the BangTan timeline.',
                'image' => 'https://raw.githubusercontent.com/MehAk-ArmAn/BangTan-imgS/refs/heads/main/8bb196cb-0104-4d10-8de2-989b773ab65a.png',
                'data' => $baseData + [
                    'type' => 'timeline',
                ],
            ],

            $model instanceof SongImage => [
                'title' => 'Music corner update 🎧💜',
                'body' => 'Something new was added to BangTan’s song collection.',
                'image' => 'https://i.pinimg.com/1200x/ef/40/ca/ef40caa8f5f62cf8fa28eb0785aed4e2.jpg',
                'data' => $baseData + [
                    'type' => 'song',
                ],
            ],

            default => null,
        };
    }
}
