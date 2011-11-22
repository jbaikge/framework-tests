--TEST--
Ensure FDataModel::blob() generates proper column definition.
--FILE--
<?php
require(dirname(__FILE__) . '/../../webroot.conf.php');
var_dump(FDataModel::blob()->getDefinition('test'));
?>
--EXPECT--
string(9) "test BLOB"

