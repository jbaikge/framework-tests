--TEST--
Ensure FJSON::decode() tosses an exception when the supplied JSON contains an error.
--FILE--
<?php
require(dirname(__FILE__) . '/../webroot.conf.php');
$json = '"string_value":"string","integer_value":1,"array_value":["one","two"]';
var_dump(FJSON::decode($json, true));
?>
--EXPECTF--
Fatal error: Uncaught exception 'FJSONException' with message 'JSON Error: Syntax error'%s
