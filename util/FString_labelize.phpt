--TEST--
Ensure FString::labelize() nixes underscores in strings and capitalizes.
--SKIPIF--
--FILE--
<?php
require(dirname(__FILE__) . '/../webroot.conf.php');
var_dump(FString::labelize("first_name"));
?>
--EXPECT--
string(10) "First Name"
