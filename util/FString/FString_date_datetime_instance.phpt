--TEST--
Ensure FString::date() works with datetime class instances.
--FILE--
<?php
require(dirname(__FILE__) . '/../../webroot.conf.php');

$date_value = 1312911420;
$date = new DateTime("@$date_value");
var_dump(FString::date($date));
?>
--EXPECT--
string(19) "Aug 9, 2011 5:37 pm"
