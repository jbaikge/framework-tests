--TEST--
Ensure FString::contains() case-insensitive haystack equals uppercase needle.
--FILE--
<?php
require(dirname(__FILE__) . '/../../webroot.conf.php');
var_dump(FString::contains("Lorem", "LOREM", true));
?>
--EXPECT--
bool(true)
