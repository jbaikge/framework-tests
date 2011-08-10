--TEST--
Ensure FString::contains() case-sensitive haystack contains blank needle.
--FILE--
<?php
require(dirname(__FILE__) . '/../webroot.conf.php');
var_dump(FString::contains("Lorem ipsum dolor sit amet", ""));
?>
--EXPECT--
bool(true)
