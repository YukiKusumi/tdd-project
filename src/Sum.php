<?php

namespace Vendor\PhpTdd;

class Sum implements Expression
{
    public Expression $augend;
    public Expression $addend;

    public function __construct(Expression $augend, Expression $addend) {
        $this->augend = $augend;
        $this->addend = $addend;
    }

    public function plus(Expression $addend): ?Expression
    {
        return null;
    }

    public function reduce(Bank $bank, string $to): Money
    {
        $amount = $this->augend->reduce($bank, $to)->amount
            + $this->addend->reduce($bank, $to)->amount;
        return new Money($amount, $to);
    }
}

