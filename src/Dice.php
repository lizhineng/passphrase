<?php

namespace Zhineng\Passphrase;

class Dice
{
    public function __construct(
        public int $sides = 6,
        public int $times = 1
    ) {
        //
    }

    public function sides(int $sides)
    {
        $this->sides = $sides;

        return $this;
    }

    public function times(int $times)
    {
        $this->times = $times;

        return $this;
    }

    public function roll(): int|array
    {
        if ($this->times > 1) {
            $numbers = [];

            for ($i = 0; $i < $this->times; $i++) {
                $numbers[] = rand(1, $this->sides);
            }

            return $numbers;
        }

        return rand(1, $this->sides);
    }
}
