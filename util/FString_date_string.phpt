--TEST--
Ensure FString::date() works with date and date/time in textual (English) formats.
--FILE--
<?php
require(dirname(__FILE__) . '/../webroot.conf.php');

var_dump(FString::date('Tuesday August 9, 2011'));
var_dump(FString::date('Tuesday August 9, 2011 8:00 pm'));
?>
--EXPECT--
string(11) "Aug 9, 2011"
string(19) "Aug 9, 2011 8:00 pm"
