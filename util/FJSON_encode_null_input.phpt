--TEST--
Ensure FJSON returns null if an empty or null value is passed.
--FILE--
<?php
require(dirname(__FILE__) . '/../webroot.conf.php');

var_dump(FJSON::encode());
var_dump(FJSON::encode(''));
?>
--EXPECT--
NULL
NULL