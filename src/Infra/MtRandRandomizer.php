<?php

namespace cmoncy\kataMarkovChain\Infra;

use cmoncy\kataMarkovChain\Generator\Randomizer;

class MtRandRandomizer implements Randomizer
{
    /**
     * @inheritDoc
     */
    public function pickOne(array $array)
    {
        if (count($array) === 0) {
            return null;
        }

        return $array[mt_rand(0, count($array) - 1)];
    }
}