--TEST--
Ensure FObjectQueryOrder tests have data to work with.
--SKIPIF--
<?php
require(dirname(__FILE__) . '/../../database/skipif.php');
?>
--FILE--
<?php
define('DATABASE', 'single');
require(dirname(__FILE__) . '/../../webroot.conf.php');
$object = new MyOrderClass();
$object->text_field = 'Text 1';
$object->int_field = 1;
$object->update();
unset($object);

$object = new MyOrderClass();
$object->text_field = 'Text 2';
$object->int_field = 2;
$object->update();
unset($object);

$object = new MyOrderClass();
$object->text_field = 'Text 3';
$object->int_field = 3;
$object->update();
unset($object);

var_dump(true);
?>
--EXPECT--
bool(true)
