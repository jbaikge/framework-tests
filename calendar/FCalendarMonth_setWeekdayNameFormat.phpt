--TEST--
Ensure FCalendarMonth::setWeekdayNameFormat() sets the right week day name format.
--SKIPIF--
<?php
require(dirname(__FILE__) . '/skipif.php');
?>
--FILE--
<?php
require_once(dirname(__FILE__) . '/../webroot.conf.php');
$month = new FCalendarMonth(date('M'), date('Y'));

var_dump($month->setWeekdayNameFormat('D')->getWeekdayNames());
?>
--EXPECT--
array(7) {
  ["sunday"]=>
  string(3) "Sun"
  ["monday"]=>
  string(3) "Mon"
  ["tuesday"]=>
  string(3) "Tue"
  ["wednesday"]=>
  string(3) "Wed"
  ["thursday"]=>
  string(3) "Thu"
  ["friday"]=>
  string(3) "Fri"
  ["saturday"]=>
  string(3) "Sat"
}
