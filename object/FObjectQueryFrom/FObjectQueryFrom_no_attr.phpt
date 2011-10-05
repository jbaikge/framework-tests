--TEST--
Ensure FObjectQueryFrom only uses objects table when no attributes specified.
--SKIPIF--
<?php
require(dirname(__FILE__) . '/../../database/skipif.php');
?>
--FILE--
<?php
define('DATABASE', 'single');
require(dirname(__FILE__) . '/../../webroot.conf.php');

$from = new FObjectQueryFrom('MyFromClass');
var_dump((string)$from);
?>
--EXPECT--
string(15) "  v_MyFromClass"
