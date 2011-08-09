--TEST--
Ensure formatDate works with unix timestamps.
--FILE--
<?php
require(dirname(__FILE__) . '/../webroot.conf.php');

$date = 1312911420;
echo FString::formatDate($date) . PHP_EOL;
$date = -1312911420;
echo FString::formatDate($date) . PHP_EOL;
?>
--EXPECT--
Aug 9, 2011 1:37 pm
May 25, 1928 2:23 am