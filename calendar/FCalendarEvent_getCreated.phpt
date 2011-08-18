--TEST--
Ensure FCalendarEvent::getCreated() returns the created time.
--SKIPIF--
<?php
require(dirname(__FILE__) . '/skipif.php');
?>
--FILE--
<?php
require_once(dirname(__FILE__) . '/../webroot.conf.php');

// Setting the values backwards to make sure created isn't derrived
$event = FCalendarEvent::newInstance();

$event->setStart('Aug 1, 2011 15:00');
var_dump($event->getCreated());

$event->setTimestamp('Aug 1, 2011 14:45');
var_dump($event->getCreated());

$event->setCreated('Aug 1, 2011 14:30');
var_dump($event->getCreated()->format('YmdHis'));
?>
--EXPECT--
NULL
NULL
string(14) "20110801143000"
