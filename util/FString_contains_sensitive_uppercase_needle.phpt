--TEST--
Ensure FString::contains() case-sensitive haystack does not contain uppercase needle.
--FILE--
<?php
require(dirname(__FILE__) . '/../webroot.conf.php');
var_dump(FString::contains("Lorem ipsum dolor sit amet", "LOREM"));
?>
--EXPECT--
bool(false)
