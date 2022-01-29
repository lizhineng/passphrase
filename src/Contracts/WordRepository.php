<?php

namespace Zhineng\Passphrase\Contracts;

interface WordRepository
{
    public function find(int $number): string|null;

    public function random(): string;

    public function count(): int;
}
