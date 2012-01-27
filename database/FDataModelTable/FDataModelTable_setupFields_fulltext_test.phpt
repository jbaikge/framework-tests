--TEST--
Ensure FDataModelTable constructs properly when passed an empty array.
--FILE--
<?php
define('DATABASE', 'single');
require(dirname(__FILE__) . '/../../webroot.conf.php');
$model = new FDataModelTable('test_table', array(
	'key' => FDataModel::varchar(128)->notNull()->index(),
	'data' => FDataModel::longtext()->fulltext()
));
var_dump($model->getCreate());
FDB::query("DROP TABLE IF EXISTS test_table");
?>
--EXPECT--
string(176) "CREATE TABLE IF NOT EXISTS `test_table` (key VARCHAR(128) NOT NULL, 
data LONGTEXT, 
INDEX `idx_key` (key), 
FULLTEXT `ft_test_table` (data)) ENGINE=InnoDB DEFAULT CHARSET=utf8"
