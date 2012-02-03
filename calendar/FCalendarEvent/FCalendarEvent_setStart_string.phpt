--TEST--
Ensure FCalendarEvent::setStart supports a string as an argument.
--SKIPIF--
<?php
require(dirname(__FILE__) . '/../skipif.php');
?>
--FILE--
<?php
require_once(dirname(__FILE__) . '/../../webroot.conf.php');

var_dump(
	FCalendarEvent::newInstance()
		->setStart('Aug 1, 2011 3pm')
		->setDuration(new DateInterval('PT15M'))
		->getEnd() == new DateTime('Aug 1, 2011 3:15pm')
);
?>
--EXPECT--
bool(true)
