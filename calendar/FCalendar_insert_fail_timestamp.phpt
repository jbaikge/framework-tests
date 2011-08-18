--TEST--
Ensure FCalendar::insert() fails with a timestamp error.
--SKIPIF--
<?php
require(dirname(__FILE__) . '/skipif.php');
?>
--FILE--
<?php
require_once(dirname(__FILE__) . '/../webroot.conf.php');

try {
	$event = FCalendarEvent::newInstance()
		->setUID('aug120111300')
		->setStart('Aug 1, 2011 1pm')
		->setDuration("30 minutes");
	$calendar = new FCalendar();
	$calendar->insert($event);
} catch (FCalendarEventInvalidException $fceie) {
	var_dump($fceie->getMessage());
}
?>
--EXPECTF--
string(%d) "%sInvalid Timestamp"
