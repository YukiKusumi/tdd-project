<?php
namespace Vendor\PhpTdd;

class WasRun extends TestCase {
    public $wasRun;

    public function __construct($name) {
        parent::__construct($name);
        $this->wasRun = null;
    }

    public function testMethod() {
        $this->wasRun = 1;
    }
}
