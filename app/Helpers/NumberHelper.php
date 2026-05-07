<?php

namespace App\Helpers;

class NumberHelper
{
    protected static $numbers = [
        0 => 'không',
        1 => 'một',
        2 => 'hai',
        3 => 'ba',
        4 => 'bốn',
        5 => 'năm',
        6 => 'sáu',
        7 => 'bảy',
        8 => 'tám',
        9 => 'chín',
    ];

    public static function numberToWords($number)
    {
        if ($number == 0) return 'Không đồng';

        $result = self::readNumber($number) . ' đồng';

        return ucfirst(trim($result));
    }

    private static function readNumber($number)
    {
        if ($number < 10) {
            return self::$numbers[$number];
        }

        if ($number < 100) {
            $tens = intval($number / 10);
            $units = $number % 10;

            $text = self::$numbers[$tens] . ' mươi';

            if ($units == 1) $text .= ' mốt';
            elseif ($units == 5) $text .= ' lăm';
            elseif ($units != 0) $text .= ' ' . self::$numbers[$units];

            return $text;
        }

        if ($number < 1000) {
            $hundreds = intval($number / 100);
            $rest = $number % 100;

            $text = self::$numbers[$hundreds] . ' trăm';

            if ($rest == 0) return $text;

            return $text . ' ' . self::readNumber($rest);
        }

        if ($number < 1000000) {
            $thousands = intval($number / 1000);
            $rest = $number % 1000;

            $text = self::readNumber($thousands) . ' nghìn';

            if ($rest == 0) return $text;

            return $text . ' ' . self::readNumber($rest);
        }

        if ($number < 1000000000) {
            $millions = intval($number / 1000000);
            $rest = $number % 1000000;

            $text = self::readNumber($millions) . ' triệu';

            if ($rest == 0) return $text;

            return $text . ' ' . self::readNumber($rest);
        }

        $billions = intval($number / 1000000000);
        $rest = $number % 1000000000;

        $text = self::readNumber($billions) . ' tỷ';

        if ($rest == 0) return $text;

        return $text . ' ' . self::readNumber($rest);
    }
}