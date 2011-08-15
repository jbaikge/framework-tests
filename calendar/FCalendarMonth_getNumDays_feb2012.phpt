--TEST--
Ensure FCalendarMonth::getNumDays() returns 29 for February, 2010.
--SKIPIF--
<?php
require(dirname(__FILE__) . '/skipif.php');
?>
--FILE--
<?php
// webroot is already included in the skipif. require_once prevents barfage.
require_once(dirname(__FILE__) . '/../webroot.conf.php');
$month = new FCalendarMonth('Feb', 2012);
var_dump($month->getNumDays());
?>
--EXPECT--
int(29)

