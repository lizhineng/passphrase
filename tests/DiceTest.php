<?php

namespace Zhineng\Passphrase\Tests;

use PHPUnit\Framework\TestCase;
use Zhineng\Passphrase\Dice;

class DiceTest extends TestCase
{
    public function test_rolling()
    {
        $number = $this->dice()->roll();

        $this->assertIsInt($number);
    }

    public function test_sides_customization()
    {
        $dice = $this->dice()->sides(4);

        $this->assertSame(4, $dice->sides);
    }

    public function test_number_of_times_to_roll()
    {
        $numbers = $this->dice()->times(5)->roll();

        $this->assertIsArray($numbers);
        $this->assertCount(5, $numbers);
    }

    protected function dice()
    {
        return new Dice;
    }
}
