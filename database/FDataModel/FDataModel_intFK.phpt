--TEST--
Ensure FDataModel::intFK() generates proper column definition.
--FILE--
<?php
require(dirname(__FILE__) . '/../../webroot.conf.php');
var_dump(FDataModel::intFK()->getDefinition('test'));
?>
--EXPECT--
string(26) "test INT UNSIGNED NOT NULL"

