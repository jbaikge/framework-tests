--TEST--
Ensure FDataModelTable constructs properly when passed an empty array.
--FILE--
<?php
define('DATABASE', 'single');
require(dirname(__FILE__) . '/../../webroot.conf.php');
$model = new FDataModelTable('test_table', array());
var_dump($model->getSQL());
?>
--EXPECT--
string(77) "CREATE TABLE IF NOT EXISTS `test_table` () ENGINE=InnoDB DEFAULT CHARSET=utf8"
