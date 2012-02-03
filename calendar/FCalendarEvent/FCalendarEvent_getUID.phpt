--TEST--
Ensure FCalendarEvent::getUID() returns the set UID.
--SKIPIF--
<?php
require(dirname(__FILE__) . '/../skipif.php');
?>
--FILE--
<?php
require_once(dirname(__FILE__) . '/../../webroot.conf.php');

$uid = 'banana-324';
var_dump($uid == FCalendarEvent::newInstance()
	->setUID($uid, false)
	->getUID()
);
?>
--EXPECT--
bool(true)
