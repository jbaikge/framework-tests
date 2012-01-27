--TEST--
Ensure FDataModelTable constructs properly when passed an empty array.
--FILE--
<?php
define('DATABASE', 'single');
require(dirname(__FILE__) . '/../../webroot.conf.php');
$model = new FDataModelTable('test_table', array(
	'key' => FDataModel::varchar(128)->notNull()->index(),
	'data' => FDataModel::int()->unsigned()->foreignKey('test', 'test_id', 'CASCADE', 'CASCADE')
));
var_dump($model->getCreate());
FDB::query("DROP TABLE IF EXISTS test_table");
?>
--EXPECT--
string(263) "CREATE TABLE IF NOT EXISTS `test_table` (key VARCHAR(128) NOT NULL, 
data INT UNSIGNED, 
INDEX `idx_key` (key), 
CONSTRAINT `fk_test_table_data` FOREIGN KEY (data) REFERENCES `test` (test_id) ON UPDATE CASCADE ON DELETE CASCADE) ENGINE=InnoDB DEFAULT CHARSET=utf8"
