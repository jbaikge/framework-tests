--TEST--
Ensure FDataModel::addTable fails with bad values.
--FILE--
<?php
require(dirname(__FILE__) . '/../../webroot.conf.php');
FDataModel::addTable('test', 'fail');
?>
--EXPECTF--
Catchable fatal error: Argument 2 passed to FDataModel::addTable() must be%sarray, string given%s
