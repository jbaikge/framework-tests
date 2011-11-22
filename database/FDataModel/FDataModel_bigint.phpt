--TEST--
Ensure FDataModel::bigint() generates proper column definition.
--FILE--
<?php
require(dirname(__FILE__) . '/../../webroot.conf.php');
var_dump(FDataModel::bigint()->getDefinition('test'));
?>
--EXPECT--
string(11) "test BIGINT"

