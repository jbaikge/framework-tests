--TEST--
Ensure FCalendarEvent::setTimezone() sets the appropriate timezone of member DateTimes.
--SKIPIF--
<?php
require(dirname(__FILE__) . '/skipif.php');
?>
--FILE--
<?php
require_once(dirname(__FILE__) . '/../webroot.conf.php');

$timezone = 'America/Adak';
$event = FCalendarEvent::newInstance()->setCreated('Aug 1, 2011 14:15');
var_dump($timezone != $event->getCreated()->getTimezone()->getName());
$event->setTimezone($timezone);
var_dump($timezone == $event->getCreated()->getTimezone()->getName());
?>
--EXPECT--
bool(true)
bool(true)
