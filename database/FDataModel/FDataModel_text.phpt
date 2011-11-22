--TEST--
Ensure FDataModel::text() generates proper column definition.
--FILE--
<?php
require(dirname(__FILE__) . '/../../webroot.conf.php');
var_dump(FDataModel::text()->getDefinition('test'));
?>
--EXPECT--
string(9) "test TEXT"

