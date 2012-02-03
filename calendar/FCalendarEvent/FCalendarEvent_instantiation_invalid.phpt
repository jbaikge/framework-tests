--TEST--
Ensure new instances are invalid, using new FCalendarEvent().
--SKIPIF--
<?php
require(dirname(__FILE__) . '/../skipif.php');
?>
--FILE--
<?php
require_once(dirname(__FILE__) . '/../../webroot.conf.php');

$e = new FCalendarEvent();
var_dump($e->isValid() !== true);
?>
--EXPECT--
bool(true)
