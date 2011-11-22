--TEST--
Ensure FDataModel::bigintFK() generates proper column definition.
--FILE--
<?php
require(dirname(__FILE__) . '/../../webroot.conf.php');
var_dump(FDataModel::bigintFK()->getDefinition('test'));
?>
--EXPECT--
string(29) "test BIGINT UNSIGNED NOT NULL"

