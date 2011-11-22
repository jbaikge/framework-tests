--TEST--
Ensure FDataModel::tinyintPK() generates proper column definition.
--FILE--
<?php
require(dirname(__FILE__) . '/../../webroot.conf.php');
var_dump(FDataModel::tinyintPK()->getDefinition('test'));
?>
--EXPECT--
string(45) "test TINYINT UNSIGNED NOT NULL AUTO_INCREMENT"

