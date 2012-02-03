--TEST--
Ensure new instances are invalid, using FCalendarEvent::newInstance().
--SKIPIF--
<?php
require(dirname(__FILE__) . '/../skipif.php');
?>
--FILE--
<?php
require_once(dirname(__FILE__) . '/../../webroot.conf.php');

var_dump(FCalendarEvent::newInstance()->isValid() !== true);
?>
--EXPECT--
bool(true)
