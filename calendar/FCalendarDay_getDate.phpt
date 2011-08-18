--TEST--
Ensure FCalendarDay::clear() returns the number of slots, not events.
--SKIPIF--
<?php
require(dirname(__FILE__) . '/skipif.php');
?>
--FILE--
<?php
require_once(dirname(__FILE__) . '/../webroot.conf.php');
$day = new FCalendarDay(new DateTime('Aug 1, 2011'));
var_dump($day->getDate()->format('Ymd'));
?>
--EXPECT--
string(8) "20110801"
