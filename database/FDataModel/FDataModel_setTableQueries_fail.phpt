--TEST--
Ensure FDataModel::setTableQueries fails with bad values.
--FILE--
<?php
require(dirname(__FILE__) . '/../../webroot.conf.php');
FDataModel::setTableQueries('test');
?>
--EXPECTF--
Catchable fatal error: Argument 1 passed to FDataModel::setTableQueries() must be of the type array, string given%s
