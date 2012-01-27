--TEST--
Ensure FDataModelTable constructs properly when passed an empty array.
--FILE--
<?php
define('DATABASE', 'single');
require(dirname(__FILE__) . '/../../webroot.conf.php');
$model = new FDataModelTable('test_table', array(
	'key' => FDataModel::varchar(128)->notNull()->index(),
	'data' => FDataModel::text(),
));
var_dump($model->getCreate())
?>
--EXPECT--
string(138) "CREATE TABLE IF NOT EXISTS `test_table` (key VARCHAR(128) NOT NULL, 
data TEXT, 
INDEX `idx_key` (key)) ENGINE=InnoDB DEFAULT CHARSET=utf8"
