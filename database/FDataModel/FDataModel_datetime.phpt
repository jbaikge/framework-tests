--TEST--
Ensure FDataModel::datetime() generates proper column definition.
--FILE--
<?php
require(dirname(__FILE__) . '/../../webroot.conf.php');
var_dump(FDataModel::datetime()->getDefinition('test'));
?>
--EXPECT--
string(13) "test DATETIME"

