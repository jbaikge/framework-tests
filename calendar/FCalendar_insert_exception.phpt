--TEST--
Ensure FCalendar::insert() throws an exception when an invalid object is passed.
--SKIPIF--
<?php
require(dirname(__FILE__) . '/skipif.php');
?>
--FILE--
<?php
require_once(dirname(__FILE__) . '/../webroot.conf.php');
$calendar = new FCalendar();
try {
	$calendar->insert(new stdClass);
	var_dump(false);
} catch (InvalidArgumentException $iae) {
	var_dump(true);
}
?>
--EXPECT--
bool(true)
