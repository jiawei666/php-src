--TEST--
Bug #60192 (SegFault when Collator not constructed properly)
--SKIPIF--
<?php
    if (!extension_loaded('intl')) { die('skip intl extension not available'); }
?>
--FILE--
<?php

class Collator2 extends Collator{
    public function __construct() {
        // omitting parent::__construct($someLocale);
    }
}

$c = new Collator2();
$a = array('a', 'b');
$c->sort($a);
?>
--EXPECTF--
Fatal error: Uncaught Error: Object not initialized in %s:%d
Stack trace:
#0 %s(%d): Collator->sort(Array)
#1 {main}
  thrown in %s on line %d
