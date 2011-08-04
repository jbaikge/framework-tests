--TEST--
Ensure FCalendarMonth::getNumDays() returns 28 for February, 2010.
--FILE--
<?php
require(dirname(__FILE__) . '/../webroot.conf.php');
$month = new FCalendarMonth('Feb', 2011);
var_dump($month->getNumDays());
?>
--EXPECT--
int(28)

