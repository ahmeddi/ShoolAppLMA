<?php

namespace App\Enums;

use Carbon\Carbon;

enum Dates: string
{
    case Today = 'today';
    case Last_7 = 'last7';
    case Week = 'week';
    case Month = 'month';
    case Last_30 = 'last30';
    case Year = 'year';
    case Past_Month = 'past_month';
    case Next_Month = 'next_month';
    case All_Time = 'all';
    case Custom = 'custom';

    public function label($start = null, $end = null)
    {
        return match ($this) {
            static::All_Time => __('calandar.tous'),
            static::Year => __('calandar.year'),
            static::Last_30 => __('calandar.lastM'),
            static::Last_7 => __('calandar.week'),
            static::Today => __('calandar.day'),
            static::Month => __('calandar.month'),
            static::Week => __('calandar.week'),
            static::Past_Month => __('calandar.pastM'),
            static::Next_Month => __('calandar.n_month'),
            static::Custom =>  __('calandar.custom'),
        };
    }

    public function dates()
    {
        return match ($this) {
            static::Today => [Carbon::today()->format('Y-m-d'), now()],
            static::Last_7 => [Carbon::today()->subDays(6)->format('Y-m-d'), now()->format('Y-m-d')],
            static::Last_30 => [Carbon::today()->subDays(29)->format('Y-m-d'), now()->format('Y-m-d')],
            static::Year => [Carbon::now()->startOfYear()->format('Y-m-d'), now()->format('Y-m-d')],
            static::Month => [Carbon::now()->startOfMonth()->format('Y-m-d'), now()->format('Y-m-d')],
            static::Week => [Carbon::now()->startOfWeek()->format('Y-m-d'), now()->format('Y-m-d')],
            static::Past_Month => [Carbon::now()->subMonth()->startOfMonth()->format('Y-m-d'), Carbon::now()->subMonth()->endOfMonth()->format('Y-m-d')],
            static::Next_Month => [Carbon::now()->addMonth()->startOfMonth()->format('Y-m-d'), Carbon::now()->addMonth()->endOfMonth()->format('Y-m-d')],
        };
    }
}
