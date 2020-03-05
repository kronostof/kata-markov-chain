<?php

namespace cmoncy\kataMarkovChain;

use cmoncy\kataMarkovChain\Generator\Chain;
use cmoncy\kataMarkovChain\Generator\Randomizer;

class Generator
{
    /**
     * @var Randomizer
     */
    private $randomizer;

    public function __construct(Randomizer $randomizer)
    {
        $this->randomizer = $randomizer;
    }

    public function __invoke(Chain $chain, int $length): string
    {
        $words = [];

        do {
            if (!isset($word)) {
                $word = $chain->pick($this->randomizer);
            }

            $words[] = $word->getText();
            $word = $word->getChain()->pick($this->randomizer);
        } while (count($words) < $length);

        return preg_replace('# +#', ' ', implode(' ', $words));
    }
}