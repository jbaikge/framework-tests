--TEST--
Ensure FString::date() returns the Epoch on invalid date input.
--FILE--
<?php
require(dirname(__FILE__) . '/../webroot.conf.php');

var_dump(FString::date('Aug. 32, 1982', 'U'));
var_dump(FString::date('Frb 28, 1982', 'U'));
var_dump(FString::date('Jan. 9, 19754', 'U'));
?>
--EXPECT--
string(1) "0"
string(1) "0"
string(1) "0"
