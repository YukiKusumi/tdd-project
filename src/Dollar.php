<?php

namespace Vendor\PhpTdd;
use PhpParser\Node\Expr\Cast\Object_;

class Dollar extends Money
{
    public function times(int $multiplier): Money
    {
        return new Money($this->amount * $multiplier, $this->currency);
    }
}
