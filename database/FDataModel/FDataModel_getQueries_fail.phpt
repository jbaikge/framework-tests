--TEST--
Ensure FDataModel::getQueries() returns an empty array if FDataModel::$modelTables hasn't been initialized.
--FILE--
<?php
define('DATABASE', 'single');
require(dirname(__FILE__) . '/../../webroot.conf.php');

var_dump(FDataModel::getQueries());
?>
--EXPECT--
array(0) {
}
