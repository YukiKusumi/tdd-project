<?php

namespace Vendor\PhpTdd;
interface Expression
{
    public function reduce(string $to): Money;
}
