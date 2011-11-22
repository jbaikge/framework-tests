--TEST--
Ensure FDataModel::timestamp() generates proper column definition.
--FILE--
<?php
require(dirname(__FILE__) . '/../../webroot.conf.php');
var_dump(FDataModel::timestamp()->getDefinition('test'));
?>
--EXPECT--
string(14) "test TIMESTAMP"

