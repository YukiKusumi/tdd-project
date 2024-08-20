<?php

namespace Vendor\PhpTdd;
interface Expression
{
    public function times(int $multiplier): ?Expression;
    public function plus(Money $addend): ?Expression;
    public function reduce(Bank $bank ,string $to): Money;
}
