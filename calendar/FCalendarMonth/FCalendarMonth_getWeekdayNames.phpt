--TEST--
Ensure FCalendarMonth::setWeekdayNameFormat() sets the right week day name format.
--SKIPIF--
<?php
require(dirname(__FILE__) . '/../skipif.php');
?>
--FILE--
<?php
require_once(dirname(__FILE__) . '/../../webroot.conf.php');
$month = new FCalendarMonth(date('M'), date('Y'));

var_dump($month->getWeekdayNames());
?>
--EXPECT--
array(7) {
  ["sunday"]=>
  string(6) "Sunday"
  ["monday"]=>
  string(6) "Monday"
  ["tuesday"]=>
  string(7) "Tuesday"
  ["wednesday"]=>
  string(9) "Wednesday"
  ["thursday"]=>
  string(8) "Thursday"
  ["friday"]=>
  string(6) "Friday"
  ["saturday"]=>
  string(8) "Saturday"
}
