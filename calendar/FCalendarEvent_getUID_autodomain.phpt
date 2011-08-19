--TEST--
Ensure FCalendarEvent::getUID() returns the set UID with the domain name automatically appended.
--SKIPIF--
<?php
require(dirname(__FILE__) . '/skipif.php');
?>
--FILE--
<?php
require_once(dirname(__FILE__) . '/../webroot.conf.php');

$_SERVER['SERVER_NAME'] = 'test.com';

$uid = 'banana-324';
$full_uid = $uid . '@' . $_SERVER['SERVER_NAME'];
var_dump($full_uid == FCalendarEvent::newInstance()
	->setUID($uid)
	->getUID()
);
?>
--EXPECT--
bool(true)
