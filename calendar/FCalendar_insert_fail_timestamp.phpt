--TEST--
Ensure FCalendar::insert() fails with a timestamp error.
--SKIPIF--
<?php
require(dirname(__FILE__) . '/skipif.php');
?>
--FILE--
<?php
// webroot is already included in the skipif. require_once prevents barfage.
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
