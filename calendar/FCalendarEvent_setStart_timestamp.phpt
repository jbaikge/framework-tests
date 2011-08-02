--TEST--
Ensure start time, set with a timestamp, gets set as a DateTime object.
--FILE--
<?php
require(dirname(__FILE__) . '/../webroot.conf.php');

var_dump(
	FCalendarEvent::newInstance()
		->setStart(1312225200)
		->getStart() instanceof DateTime
);
?>
--EXPECT--
bool(true)
