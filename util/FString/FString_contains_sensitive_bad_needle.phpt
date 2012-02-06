--TEST--
Ensure FString::contains() case-sensitive haystack does not contain bad needle.
--FILE--
<?php
require(dirname(__FILE__) . '/../../webroot.conf.php');
var_dump(FString::contains("Lorem ipsum dolor sit amet", "amot"));
?>
--EXPECT--
bool(false)
