--TEST--
Ensure FDataModel::addTableQueries fails with bad values.
--FILE--
<?php
require(dirname(__FILE__) . '/../../webroot.conf.php');
FDataModel::addTableQueries('test', 'fail');
?>
--EXPECTF--
Catchable fatal error: Argument 2 passed to FDataModel::addTableQueries() must be an array, string given%s
