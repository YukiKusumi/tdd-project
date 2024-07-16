<?php

namespace Vendor\PhpTdd;
use PhpParser\Node\Expr\Cast\Object_;

class Dollar extends Money
{
    public function times(int $multiplier): Money
    {
        return Money::Dollar($this->amount * $multiplier);
    }
}
