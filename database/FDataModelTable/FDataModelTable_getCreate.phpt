--TEST--
Ensure FDataModelTable::getCreate() returns the proper SQL for creating tables.
--FILE--
<?php
define('DATABASE', 'single');
require(dirname(__FILE__) . '/../../webroot.conf.php');
$model = new FDataModelTable('test_table', array());
var_dump($model->getCreate());
?>
--EXPECT--
string(77) "CREATE TABLE IF NOT EXISTS `test_table` () ENGINE=InnoDB DEFAULT CHARSET=utf8"
