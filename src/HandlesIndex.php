<?php

namespace Zhineng\Passphrase;

trait HandlesIndex
{
    protected function findIndex(int $number)
    {
        return Index::fromNumber($number);
    }

    protected function randomIndex()
    {
        return rand(0, $this->count() - 1);
    }
}
