<?php

namespace Vendor\PhpTdd;

class Bank
{
    public function reduce(Expression $source, string $to):Money
    {
        return $source->reduce($to);
    }

    public function addRate(string $from, string $to, int $rate): void
    {

    }
}
