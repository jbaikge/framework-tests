--TEST--
Ensure start time, set with a timestamp, gets set as a DateTime object.
--SKIPIF--
<?php
require(dirname(__FILE__) . '/skipif.php');
?>
--FILE--
<?php
// webroot is already included in the skipif. require_once prevents barfage.
require_once(dirname(__FILE__) . '/../webroot.conf.php');

var_dump(
	FCalendarEvent::newInstance()
		->setStart(1312225200)
		->getStart() instanceof DateTime
);
?>
--EXPECT--
bool(true)
