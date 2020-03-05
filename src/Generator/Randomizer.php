<?php

namespace cmoncy\kataMarkovChain\Generator;

interface Randomizer
{
    /** @return mixed one random element of the array */
    public function pickOne(array $array);
}