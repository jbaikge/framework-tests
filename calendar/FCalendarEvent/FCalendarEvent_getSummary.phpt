--TEST--
Ensure FCalendarEvent::getSummary() returns the set title/summary.
--SKIPIF--
<?php
require(dirname(__FILE__) . '/../skipif.php');
?>
--FILE--
<?php
require_once(dirname(__FILE__) . '/../../webroot.conf.php');

$title = 'Monkey Banana Chucking';
var_dump($title == FCalendarEvent::newInstance()
	->setTitle($title)
	->getSummary()
);
?>
--EXPECT--
bool(true)
