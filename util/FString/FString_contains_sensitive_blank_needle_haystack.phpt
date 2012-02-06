--TEST--
Ensure FString::contains() case-sensitive blank haystack contains blank needle.
--FILE--
<?php
require(dirname(__FILE__) . '/../../webroot.conf.php');
var_dump(FString::contains('', ''));
?>
--EXPECT--
bool(true)
