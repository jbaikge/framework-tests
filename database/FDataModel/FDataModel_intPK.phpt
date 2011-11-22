--TEST--
Ensure FDataModel::intPK() generates proper column definition.
--FILE--
<?php
require(dirname(__FILE__) . '/../../webroot.conf.php');
var_dump(FDataModel::intPK()->getDefinition('test'));
?>
--EXPECT--
string(41) "test INT UNSIGNED NOT NULL AUTO_INCREMENT"

