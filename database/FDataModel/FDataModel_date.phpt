--TEST--
Ensure FDataModel::date() generates proper column definition.
--FILE--
<?php
require(dirname(__FILE__) . '/../../webroot.conf.php');
var_dump(FDataModel::date()->getDefinition('test'));
?>
--EXPECT--
string(9) "test DATE"

