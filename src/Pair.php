<?php

namespace Vendor\PhpTdd;

use PhpParser\Node\Expr\Cast\Object_;

class Pair
{
   private string $from;
   private string $to;

   public function __construct(string $from, string $to)
   {
       $this->from = $from;
       $this->to = $to;
   }

    public function __toString(): string
    {
        return $this->from . '->' . $this->to;
    }

   public function equals(object $object){
       $pair = $object;
       return $this->from === $pair->from && $this->to === $pair->to;
   }

   public function hashCode(): int
   {
       return 0;
   }

}

