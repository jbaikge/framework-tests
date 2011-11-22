--TEST--
Ensure FDataModel::double() generates proper column definition.
--FILE--
<?php
require(dirname(__FILE__) . '/../../webroot.conf.php');
var_dump(FDataModel::double()->getDefinition('test'));
?>
--EXPECT--
string(17) "test DOUBLE(6, 2)"

