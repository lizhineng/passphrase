<?php

namespace Zhineng\Passphrase;

use Zhineng\Passphrase\Contracts\WordRepository;

class TextRepository implements WordRepository
{
    use HandlesIndex;

    protected array $content = [];

    public function __construct(
        protected string $path
    ) {
        //
    }

    public static function useBuiltIn()
    {
        return new static(__DIR__.'/../resources/eff_large_wordlist.txt');
    }

    public function find(int $number): string|null
    {
        $line = $this->content()[$this->findIndex($number)] ?? '';

        return $this->parse($line);
    }

    public function random(): string
    {
        $line = $this->content()[$this->randomIndex()];

        return $this->parse($line);
    }

    public function count(): int
    {
        return count($this->content());
    }

    protected function parse(string $line)
    {
        $data = explode("\t", $line);

        return $data[1] ?? null;
    }

    protected function content()
    {
        if (empty($this->content)) {
            $this->content = file($this->path, FILE_IGNORE_NEW_LINES);
        }

        return $this->content;
    }
}
