--TEST--
Ensure FDataModel::addTable() accepts valid args.
--FILE--
<?php
require(dirname(__FILE__) . '/../../webroot.conf.php');
FDataModel::addTable('test', array(
	'id' => FDataModel::intPK()
));
var_dump(true);
?>
--EXPECT--
bool(true)
