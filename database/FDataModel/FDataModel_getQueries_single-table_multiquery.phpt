--TEST--
Ensure FDataModel::getQueries() returns all queries when multiple queries are "assigned" to a single table.
--FILE--
<?php
define('DATABASE', 'single');
require(dirname(__FILE__) . '/../../webroot.conf.php');

FDataModel::addTable('test', array(
	'id' => FDataModel::intPK()
));
FDataModel::setTableQueries(
	array(
		'test' => array(
			"INSERT INTO test (id) VALUES (1)",
			"INSERT INTO test (id) VALUES (2)",
			"INSERT INTO test (id) VALUES (3)"
		)
	));
var_dump(FDataModel::getQueries());
?>
--EXPECT--
array(4) {
  ["test"]=>
  string(129) "CREATE TABLE IF NOT EXISTS `test` (id INT UNSIGNED NOT NULL AUTO_INCREMENT, 
PRIMARY KEY (id)) ENGINE=InnoDB DEFAULT CHARSET=utf8"
  ["test_0"]=>
  string(32) "INSERT INTO test (id) VALUES (1)"
  ["test_1"]=>
  string(32) "INSERT INTO test (id) VALUES (2)"
  ["test_2"]=>
  string(32) "INSERT INTO test (id) VALUES (3)"
}
