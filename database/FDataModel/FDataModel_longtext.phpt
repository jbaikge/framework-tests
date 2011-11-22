--TEST--
Ensure FDataModel::longtext() generates proper column definition.
--FILE--
<?php
require(dirname(__FILE__) . '/../../webroot.conf.php');
var_dump(FDataModel::longtext()->getDefinition('test'));
?>
--EXPECT--
string(13) "test LONGTEXT"

