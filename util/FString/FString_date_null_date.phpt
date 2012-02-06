--TEST--
Ensure FString::date() returns null on null input values.
--FILE--
<?php
require(dirname(__FILE__) . '/../../webroot.conf.php');

var_dump(FString::date(null));
?>
--EXPECT--
NULL
