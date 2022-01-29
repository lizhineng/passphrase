<?php

namespace Zhineng\Passphrase;

use Zhineng\Passphrase\Contracts\WordRepository;

class Passphrase
{
    public string $seperator = '-';

    public int $count = 6;

    public function __construct(
        protected WordRepository $words
    ) {
        //
    }

    public function words(int $count)
    {
        $this->count = $count;

        return $this;
    }

    public function seperatedBy(string $seperator)
    {
        $this->seperator = $seperator;

        return $this;
    }

    public function make(): string
    {
        $words = [];

        for ($i = 0; $i < $this->count; $i++) {
            $words[] = $this->words->random();
        }

        return implode($this->seperator, $words);
    }
}
