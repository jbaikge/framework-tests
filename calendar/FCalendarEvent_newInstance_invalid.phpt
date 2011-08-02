--TEST--
Ensure new instances are invalid, using FCalendarEvent::newInstance().
--FILE--
<?php
require(dirname(__FILE__) . '/../webroot.conf.php');

var_dump(FCalendarEvent::newInstance()->valid() !== true);
?>
--EXPECT--
bool(true)
