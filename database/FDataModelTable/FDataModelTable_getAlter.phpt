--TEST--
Ensure FDataModelTable::getAlter() returns the proper SQL for altering tables.
--FILE--
<?php
define('DATABASE', 'single');
require(dirname(__FILE__) . '/../../webroot.conf.php');
$fields = array(
	'id' => FDataModel::intPK(),
);
$model = new FDataModelTable('test_table', $fields);
$pre_alter = $model->getSQL();
FDB::query($pre_alter);
$fields['name'] = FDataModel::text();
$model = new FDataModelTable('test_table', $fields);
var_dump($pre_alter, $model->getSQL());
// Clean up our mess.
FDB::query("DROP TABLE IF EXISTS test_table");
?>
--EXPECT--
string(135) "CREATE TABLE IF NOT EXISTS `test_table` (id INT UNSIGNED NOT NULL AUTO_INCREMENT, 
PRIMARY KEY (id)) ENGINE=InnoDB DEFAULT CHARSET=utf8"
string(56) "ALTER TABLE `test_table` ADD COLUMN name TEXT AFTER `id`"
