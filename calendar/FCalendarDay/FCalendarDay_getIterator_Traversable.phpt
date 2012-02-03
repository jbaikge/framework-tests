--TEST--
Ensure FCalendarDay::getIterator() returns a valid Traversable object for looping.
--SKIPIF--
<?php
require(dirname(__FILE__) . '/../skipif.php');
?>
--FILE--
<?php
require_once(dirname(__FILE__) . '/../../webroot.conf.php');
$day = new FCalendarDay(new DateTime('Aug 1, 2011'));
var_dump($day instanceof Traversable);
?>
--EXPECT--
bool(true)
