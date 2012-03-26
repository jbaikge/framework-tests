--TEST--
Ensure FDataModel::addTable fails with bad values.
--FILE--
<?php
require(dirname(__FILE__) . '/../../webroot.conf.php');
try {
	FDataModel::addTable('test', 'fail');
	var_dump(false);
} catch (Exception $e) {
	var_dump(true);
}
?>
--EXPECT--
bool(true)
