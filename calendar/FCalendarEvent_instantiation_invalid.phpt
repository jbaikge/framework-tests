--TEST--
Ensure new instances are invalid, using new FCalendarEvent().
--SKIPIF--
<?php
require(dirname(__FILE__) . '/skipif.php');
?>
--FILE--
<?php
// webroot is already included in the skipif. require_once prevents barfage.
require_once(dirname(__FILE__) . '/../webroot.conf.php');

$e = new FCalendarEvent();
var_dump($e->valid() !== true);
?>
--EXPECT--
bool(true)
