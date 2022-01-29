<?php

namespace Zhineng\Passphrase\Tests;

use PHPUnit\Framework\TestCase;
use Zhineng\Passphrase\Index;

class IndexMapperTest extends TestCase
{
    /**
     * @dataProvider proviers_number_and_indexes
     */
    public function test_convert_number_to_index($number, $index)
    {
        $this->assertSame($index, Index::fromNumber($number));
    }

    public function proviers_number_and_indexes()
    {
        return [
            [11111, 0],
            [11115, 4],
            [11116, 5],
            [11121, 6],
            [11211, 36],
            [21111, 1296],
            [32221, 2850],
            [43443, 4448],
            [51111, 5184],
            [66666, 7775],
        ];
    }
}
