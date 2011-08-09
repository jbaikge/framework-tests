--TEST--
Ensure formatDate works with datetime class instances.
--FILE--
<?php
require(dirname(__FILE__) . '/../webroot.conf.php');

$date_value = 1312911420;
$date = new DateTime("@$date_value");
echo FString::formatDate($date) . PHP_EOL;
?>
--EXPECT--
Aug 9, 2011 5:37 pm