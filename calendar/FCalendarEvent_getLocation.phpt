--TEST--
Ensure FCalendarEvent::getLocation() returns the set location
--SKIPIF--
<?php
require(dirname(__FILE__) . '/skipif.php');
?>
--FILE--
<?php
require_once(dirname(__FILE__) . '/../webroot.conf.php');

$location = 'Conference room on second floor.';
var_dump($location == FCalendarEvent::newInstance()
	->setLocation($location)
	->getLocation()
);
?>
--EXPECT--
bool(true)
