--TEST--
Ensure FString::contains() case-sensitive haystack equals needle.
--FILE--
<?php
require(dirname(__FILE__) . '/../../webroot.conf.php');
var_dump(FString::contains("Lorem ipsum dolor sit amet", "Lorem ipsum dolor sit amet"));
?>
--EXPECT--
bool(true)
