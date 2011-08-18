--TEST--
Ensure start time, set with a string date, gets set as a DateTime object.
--SKIPIF--
<?php
require(dirname(__FILE__) . '/skipif.php');
?>
--FILE--
<?php
require_once(dirname(__FILE__) . '/../webroot.conf.php');

var_dump(
	FCalendarEvent::newInstance()
		->setStart('Aug 1, 2011 3pm')
		->getStart() instanceof DateTime
);
?>
--EXPECT--
bool(true)
