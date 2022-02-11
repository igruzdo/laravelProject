<?php

namespace App\Contracts;

interface Parser 
{
    public function setLink(string $str): self;

    public function parse(): array;
}