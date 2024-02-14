<?php

namespace App\Enums;


enum Months: string
{
    case SEP = '9';
    case OCT = '10';
    case NOV = '11';
    case DEC = '12';
    case JAN = '1';
    case FEB = '2';
    case MAR = '3';
    case APR = '4';
    case MAY = '5';
    case JUN = '6';
    //   case JUL = '7';
    //   case AUG = '8';





    public function label()
    {
        return match ($this) {
            static::JAN => __('months.jan'),
            static::FEB => __('months.feb'),
            static::MAR => __('months.mar'),
            static::APR => __('months.apr'),
            static::MAY => __('months.may'),
            static::JUN => __('months.jun'),
            //     static::JUL => __('months.jul'),
            //     static::AUG => __('months.aug'),
            static::SEP => __('months.sep'),
            static::OCT => __('months.oct'),
            static::NOV => __('months.nov'),
            static::DEC => __('months.dec'),
        };
    }
}
