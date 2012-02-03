--TEST--
Ensure FCalendarEvent::getURL() pukes when a bad URL is supplied.
--SKIPIF--
<?php
require(dirname(__FILE__) . '/../skipif.php');
?>
--FILE--
<?php
require_once(dirname(__FILE__) . '/../../webroot.conf.php');


$url = 'google.com';
FCalendarEvent::newInstance()->setURL($url);
?>
--EXPECTF--
Warning: Invalid URL: google.com in %s
