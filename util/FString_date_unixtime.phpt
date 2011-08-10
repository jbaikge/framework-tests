--TEST--
Ensure FString::date() works with unix timestamps.
--FILE--
<?php
require(dirname(__FILE__) . '/../webroot.conf.php');

var_dump(FString::date(1312911420));
var_dump(FString::date(-1312911420));
?>
--EXPECT--
string(19) "Aug 9, 2011 1:37 pm"
string(20) "May 25, 1928 2:23 am"
