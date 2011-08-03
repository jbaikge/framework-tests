--TEST--
Ensure FCalendar::insert() fails with a UID error.
--FILE--
<?php
require(dirname(__FILE__) . '/../webroot.conf.php');

try {
	$event = FCalendarEvent::newInstance()
		->setStart('Aug 1, 2011 1pm')
		->setDuration("30 minutes");
	$calendar = new FCalendar();
	$calendar->insert($event);
} catch (FCalendarEventInvalidException $fceie) {
	var_dump($fceie->getMessage());
}
?>
--EXPECTF--
string(%d) "%sInvalid UID%s"
