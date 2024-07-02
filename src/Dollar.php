<?php

namespace Vendor\PhpTdd;
use PhpParser\Node\Expr\Cast\Object_;

class Dollar extends Money
{

    public function __construct($amount)
    {
        $this->amount = $amount;
    }

    public function times(int $multiplier): Money
    {
        return new Dollar($this->amount * $multiplier);
    }
}
