<?php

namespace Vendor\PhpTdd;

class TestCase {
    protected $name;

    public function __construct($name) {
        $this->name = $name;
    }

    public function run() {
        $method = $this->name;
        $this->$method();  // 動的にメソッドを呼び出す
    }
}
