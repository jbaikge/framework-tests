--TEST--
Ensure FCalendarEvent::getURL() returns the set URL.
--SKIPIF--
<?php
require(dirname(__FILE__) . '/../skipif.php');
?>
--FILE--
<?php
require_once(dirname(__FILE__) . '/../../webroot.conf.php');


$url = 'http://google.com';
var_dump($url == FCalendarEvent::newInstance()
	->setURL($url)
	->getURL()
);
?>
--EXPECT--
bool(true)
