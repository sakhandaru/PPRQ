<?php

namespace App\Services;

use Carbon\Carbon;
use App\Models\KasPayment;

class KasService
{
    public static function generateForUser($user)
    {
        $start = Carbon::parse($user->profile->tanggal_masuk)->startOfMonth();
        $now   = Carbon::now()->startOfMonth();

        while ($start <= $now) {
            $bulan = $start->format('Y-m');

            KasPayment::firstOrCreate(
                [
                    'user_id' => $user->id,
                    'bulan'   => $bulan,
                ],
                [
                    'amount' => 125000,
                    'status' => 'unpaid',
                ]
            );

            $start->addMonth();
        }
    }
}
