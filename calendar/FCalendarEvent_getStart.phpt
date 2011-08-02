--TEST--
Ensure start time gets set as a DateTime object.
--FILE--
<?php
require(dirname(__FILE__) . '/../webroot.conf.php');

var_dump(
	FCalendarEvent::newInstance()
		->setStart('Aug 1, 2011 3pm')
		->getStart() instanceof DateTime
);
?>
--EXPECT--
bool(true)
