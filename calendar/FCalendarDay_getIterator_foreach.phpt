--TEST--
Ensure FCalendarDay::getIterator() returns a valid object for looping with foreach.
--SKIPIF--
<?php
require(dirname(__FILE__) . '/skipif.php');
?>
--FILE--
<?php
// webroot is already included in the skipif. require_once prevents barfage.
require_once(dirname(__FILE__) . '/../webroot.conf.php');
$day = new FCalendarDay(new DateTime('Aug 1, 2011'));
foreach ($day as $event) {}
// Don't need to actually loop, 
var_dump(true);
?>
--EXPECT--
bool(true)
