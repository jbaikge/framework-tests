--TEST--
Ensure FCalendar::insert() works.
--FILE--
<?php
require(dirname(__FILE__) . '/../webroot.conf.php');

$event = FCalendarEvent::newInstance()
	->setCreated('Aug 1, 2011 1pm')
	->setStart('Aug 1, 2011 1pm')
	->setDuration("30 minutes");
$calendar = new FCalendar();

var_dump($calendar->count());
$calendar->insert($event);
var_dump($calendar->count());
?>
--EXPECT--
int(0)
int(1)
