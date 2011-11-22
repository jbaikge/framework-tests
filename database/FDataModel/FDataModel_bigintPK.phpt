--TEST--
Ensure FDataModel::bigintPK() generates proper column definition.
--FILE--
<?php
require(dirname(__FILE__) . '/../../webroot.conf.php');
var_dump(FDataModel::bigintPK()->getDefinition('test'));
?>
--EXPECT--
string(44) "test BIGINT UNSIGNED NOT NULL AUTO_INCREMENT"

