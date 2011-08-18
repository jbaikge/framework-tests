--TEST--
Ensure FCalendarEvent::getExtra() retrieves the proper extras.
--SKIPIF--
<?php
require(dirname(__FILE__) . '/skipif.php');
?>
--FILE--
<?php
require_once(dirname(__FILE__) . '/../webroot.conf.php');

$extra1 = 'monkey';
$extra2 = 'banana';
var_dump($extra1 == FCalendarEvent::newInstance()
	->setExtra('extra1', $extra1)
	->setExtra('extra2', $extra2)
	->getExtra('extra1')
);
?>
--EXPECT--
bool(true)
