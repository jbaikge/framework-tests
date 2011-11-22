--TEST--
Ensure FDataModel::varchar() generates proper column definition.
--FILE--
<?php
require(dirname(__FILE__) . '/../../webroot.conf.php');
var_dump(FDataModel::varchar()->getDefinition('test'));
?>
--EXPECT--
string(12) "test VARCHAR"

