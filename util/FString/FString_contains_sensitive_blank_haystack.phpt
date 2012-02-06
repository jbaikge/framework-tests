--TEST--
Ensure FString::contains() case-sensitive blank haystack does not contain needle.
--FILE--
<?php
require(dirname(__FILE__) . '/../../webroot.conf.php');
var_dump(FString::contains("", "Lorem"));
?>
--EXPECT--
bool(false)
