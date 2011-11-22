--TEST--
Ensure FDataModel::char() generates proper column definition.
--FILE--
<?php
require(dirname(__FILE__) . '/../../webroot.conf.php');
var_dump(FDataModel::char()->getDefinition('test'));
?>
--EXPECT--
string(9) "test CHAR"

