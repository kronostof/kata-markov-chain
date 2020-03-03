<?php

namespace cmoncy\kataMarkovChain\Analyser;

interface InputText
{
    public function streamCharacters(): \Generator;
}