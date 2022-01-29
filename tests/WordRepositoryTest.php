<?php

namespace Zhineng\Passphrase\Tests;

use PHPUnit\Framework\TestCase;
use Zhineng\Passphrase\ArrayRepository;
use Zhineng\Passphrase\Contracts\WordRepository;
use Zhineng\Passphrase\TextRepository;

class WordRepositoryTest extends TestCase
{
    /**
     * @dataProvider provides_repositories
     */
    public function test_retrieve_a_word(WordRepository $words)
    {
        $this->assertSame('abacus', $words->find(11111));
    }

    /**
     * @dataProvider provides_repositories
     */
    public function test_retrieve_a_word_by_invalid_number(WordRepository $words)
    {
        $this->assertNull($words->find(99999));
    }

    /**
     * @dataProvider provides_repositories
     */
    public function test_retrieve_a_word_randomly(WordRepository $words)
    {
        [$word1, $word2] = [$words->random(), $words->random()];

        $this->assertIsString($word1);
        $this->assertNotSame($word1, $word2);
    }

    /**
     * @dataProvider provides_repositories
     */
    public function test_words_counting(WordRepository $words)
    {
        $this->assertSame((new ArrayRepository)->count(), $words->count());
    }

    public function provides_repositories()
    {
        return [
            'array repository' => [new ArrayRepository],
            'text repository' => [TextRepository::useBuiltIn()],
        ];
    }
}
