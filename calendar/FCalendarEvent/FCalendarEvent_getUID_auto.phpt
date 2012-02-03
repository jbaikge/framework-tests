--TEST--
Ensure FCalendarEvent::getUID() returns the automatically generated UID.
--SKIPIF--
<?php
require(dirname(__FILE__) . '/../skipif.php');
?>
--FILE--
<?php
require_once(dirname(__FILE__) . '/../../webroot.conf.php');


$full_uid = date(DateTime::ISO8601) . '@' . gethostname();

var_dump($full_uid == FCalendarEvent::newInstance()
	->setCreated('now')
	->getUID()
);
?>
--EXPECT--
bool(true)
