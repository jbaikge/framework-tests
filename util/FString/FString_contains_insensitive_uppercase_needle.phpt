--TEST--
Ensure FString::contains() case-insensitive haystack contains uppercase needle.
--FILE--
<?php
require(dirname(__FILE__) . '/../../webroot.conf.php');
var_dump(FString::contains("Lorem ipsum dolor sit amet", "LOREM", true));
?>
--EXPECT--
bool(true)
