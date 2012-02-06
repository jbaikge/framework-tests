--TEST--
Ensure FString::contains() case-insensitive haystack does not contain bad needle.
--FILE--
<?php
require(dirname(__FILE__) . '/../../webroot.conf.php');
var_dump(FString::contains("Lorem ipsum dolor sit amet", "amot", true));
?>
--EXPECT--
bool(false)
