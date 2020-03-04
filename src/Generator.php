<?php

namespace cmoncy\kataMarkovChain;

use cmoncy\kataMarkovChain\Generator\Chain;

class Generator
{
    public function __invoke(Chain $chain, int $length): string
    {
        $words = [];

        do {
            if (!isset($word)) {
                $word = $chain->pick();
            }

            $words[] = $word->getText();
            $word = $word->getChain()->pick();
        } while (count($words) < $length);

        return preg_replace('# +#', ' ', implode(' ', $words));
    }
}