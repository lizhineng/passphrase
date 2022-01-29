<?php

namespace Zhineng\Passphrase\Tests;

use PHPUnit\Framework\TestCase;
use Zhineng\Passphrase\ArrayRepository;
use Zhineng\Passphrase\Passphrase;

class PassphraseTest extends TestCase
{
    public function test_generation()
    {
        $passphrase = $this->passphrase()->make();
        $this->assertIsString($passphrase);
        $this->assertStringMatchesFormat('%s-%s-%s-%s-%s', $passphrase);
    }

    public function test_seperator_customization()
    {
        $passphrase = $this->passphrase()->seperatedBy('*');
        $this->assertSame('*', $passphrase->seperator);
    }

    public function test_words_customization()
    {
        $passphrase = $this->passphrase()->words(3);
        $this->assertSame(3, $passphrase->count);
    }

    protected function passphrase()
    {
        return new Passphrase(new ArrayRepository);
    }
}
