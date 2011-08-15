--TEST--
Ensure start time gets set as a DateTime object.
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
		->setStart('Aug 1, 2011 3pm')
		->getStart() instanceof DateTime
);
?>
--EXPECT--
bool(true)
