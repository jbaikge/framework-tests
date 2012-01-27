--TEST--
Ensure FDataModelTable::getAlter() returns the proper SQL for altering tables.
--FILE--
<?php
define('DATABASE', 'single');
require(dirname(__FILE__) . '/../../webroot.conf.php');
$fields = array(
	'id' => FDataModel::intPK(),
	'name' => FDataModel::text()
);
$model = new FDataModelTable('test_table', $fields);
$pre_alter = $model->getSQL();
FDB::query($pre_alter);
$fields = array(
	'id' => FDataModel::intPK(),
	'name' => FDataModel::text(),
	'data' => FDataModel::text(),
);
$model = new FDataModelTable('test_table', $fields);
var_dump($pre_alter, $model->getSQL());
// Clean up our mess.
FDB::query("DROP TABLE IF EXISTS test_table");
?>
--EXPECT--
string(147) "CREATE TABLE IF NOT EXISTS `test_table` (id INT UNSIGNED NOT NULL AUTO_INCREMENT, 
name TEXT, 
PRIMARY KEY (id)) ENGINE=InnoDB DEFAULT CHARSET=utf8"
string(58) "ALTER TABLE `test_table` ADD COLUMN data TEXT AFTER `name`"
