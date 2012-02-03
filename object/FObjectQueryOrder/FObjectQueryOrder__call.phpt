--TEST--
Ensure FObjectQueryOrder magic method __call returns.
--SKIPIF--
<?php
require(dirname(__FILE__) . '/../../database/skipif.php');
?>
--FILE--
<?php
define('DATABASE', 'single');
require(dirname(__FILE__) . '/../../webroot.conf.php');

$order = new FObjectQueryOrder();
var_dump($order->hasClauses(), $order->bogus_method());
?>
--EXPECT--
bool(false)
NULL
