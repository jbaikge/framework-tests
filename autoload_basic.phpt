--TEST--
Ensure __autoload() works with namespaces.
--FILE--
<?php
require('webroot.conf.php');
var_dump(class_exists('FStringCycle'));
$cycle = new FStringCycle('one', 'two');
var_dump((string)$cycle, "$cycle");
?>
--EXPECT--
bool(true)
string(3) "one"
string(3) "two"
