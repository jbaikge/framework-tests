--TEST--
Ensure FString::date() uses $format_override if provided.
--FILE--
<?php
require(dirname(__FILE__) . '/../webroot.conf.php');

var_dump(FString::date('Aug 9, 2011'));
var_dump(FString::date('Aug 9, 2011', 'Y-m-d/H:i:s'));
var_dump(FString::date('Aug 9, 2011 13:37', 'Y-m-d/H:i:s'));
?>
--EXPECT--
string(11) "Aug 9, 2011"
string(19) "2011-08-09/00:00:00"
string(19) "2011-08-09/13:37:00"
