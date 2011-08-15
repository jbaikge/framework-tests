--TEST--
Ensure new instances are invalid, using FCalendarEvent::newInstance().
--SKIPIF--
<?php
require(dirname(__FILE__) . '/skipif.php');
?>
--FILE--
<?php
// webroot is already included in the skipif. require_once prevents barfage.
require_once(dirname(__FILE__) . '/../webroot.conf.php');

var_dump(FCalendarEvent::newInstance()->valid() !== true);
?>
--EXPECT--
bool(true)
