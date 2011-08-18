--TEST--
Ensure FCalendarEvent::getDescription() returns the set description.
--SKIPIF--
<?php
require(dirname(__FILE__) . '/skipif.php');
?>
--FILE--
<?php
require_once(dirname(__FILE__) . '/../webroot.conf.php');

$description = 'This is an awesome event.';
var_dump($description == FCalendarEvent::newInstance()
	->setDescription($description)
	->getDescription()
);
?>
--EXPECT--
bool(true)
