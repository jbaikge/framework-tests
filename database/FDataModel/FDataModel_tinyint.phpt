--TEST--
Ensure FDataModel::tinyint() generates proper column definition.
--FILE--
<?php
require(dirname(__FILE__) . '/../../webroot.conf.php');
var_dump(FDataModel::tinyint()->getDefinition('test'));
?>
--EXPECT--
string(12) "test TINYINT"

