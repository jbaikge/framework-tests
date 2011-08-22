--TEST--
Ensure FCalendarEvent::getUpdated() returns the set updated date.
--SKIPIF--
<?php
require(dirname(__FILE__) . '/skipif.php');
?>
--FILE--
<?php
require_once(dirname(__FILE__) . '/../webroot.conf.php');

var_dump(FCalendarEvent::newInstance()
	->setUpdated('Aug 1, 2011 3pm')
	->getUpdated() instanceof DateTime
);
?>
--EXPECT--
bool(true)
