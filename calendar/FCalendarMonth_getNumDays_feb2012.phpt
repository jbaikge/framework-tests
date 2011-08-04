--TEST--
Ensure FCalendarMonth::getNumDays() returns 29 for February, 2010.
--FILE--
<?php
require(dirname(__FILE__) . '/../webroot.conf.php');
$month = new FCalendarMonth('Feb', 2012);
var_dump($month->getNumDays());
?>
--EXPECT--
int(29)

