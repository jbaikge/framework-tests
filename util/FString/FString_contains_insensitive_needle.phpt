--TEST--
Ensure FString::contains() case-insensitive haystack contains needle.
--FILE--
<?php
require(dirname(__FILE__) . '/../../webroot.conf.php');
var_dump(FString::contains("Lorem ipsum dolor sit amet", "Lorem", true));
?>
--EXPECT--
bool(true)
