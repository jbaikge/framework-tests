--TEST--
Ensure FString::date() defaults to the date/time format specified in the config if the $format_override is empty.
--FILE--
<?php
require(dirname(__FILE__) . '/../webroot.conf.php');

var_dump(FString::date('Aug 9, 2011', ''));
?>
--EXPECT--
string(11) "Aug 9, 2011"
