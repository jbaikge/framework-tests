--TEST--
Ensure FDataModel::int() generates proper column definition.
--FILE--
<?php
require(dirname(__FILE__) . '/../../webroot.conf.php');
var_dump(FDataModel::int()->getDefinition('test'));
?>
--EXPECT--
string(8) "test INT"

