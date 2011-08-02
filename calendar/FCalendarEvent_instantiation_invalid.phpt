--TEST--
Ensure new instances are invalid, using new FCalendarEvent().
--FILE--
<?php
require(dirname(__FILE__) . '/../webroot.conf.php');

$e = new FCalendarEvent();
var_dump($e->valid() !== true);
?>
--EXPECT--
bool(true)
