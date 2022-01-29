<?php

namespace Zhineng\Passphrase;

class Index
{
    public static function fromNumber(int $number)
    {
        $length = strlen((string) $number);

        $index = 0;

        for ($i = 0; $i < $length; $i++) {
            $index += (((int) ($number / 10 ** $i) % 10) - 1) * 6 ** $i;
        }

        return $index;
    }
}
