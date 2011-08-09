--TEST--
Ensure FCalendarDay::getIterator() returns a valid object for looping with foreach.
--FILE--
<?php
require(dirname(__FILE__) . '/../webroot.conf.php');
$day = new FCalendarDay(new DateTime('Aug 1, 2011'));
foreach ($day as $event) {}
// Don't need to actually loop, 
var_dump(true);
?>
--EXPECT--
bool(true)
