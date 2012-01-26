--TEST--
Ensure FDataModel::setTableQueries fails with bad values.
--FILE--
<?php
require(dirname(__FILE__) . '/../../webroot.conf.php');
FDataModel::setTableQueries('test', 'fail');
?>
--EXPECTF--
Warning: Invalid argument supplied for foreach() in %s
