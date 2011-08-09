--TEST--
Ensure formatDate returns null on null input values.
--FILE--
<?php
require(dirname(__FILE__) . '/../webroot.conf.php');

var_dump(FString::formatDate(null));
?>
--EXPECT--
NULL
