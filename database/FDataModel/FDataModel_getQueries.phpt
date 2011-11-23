--TEST--
Ensure FDataModel::getQueries() works.
--FILE--
<?php
define('DATABASE', 'single');
require(dirname(__FILE__) . '/../../webroot.conf.php');

FDataModel::addTable('test', array(
	'id' => FDataModel::intPK()
));
var_dump(FDataModel::getQueries());
?>
--EXPECT--
array(1) {
  ["test"]=>
  string(129) "CREATE TABLE IF NOT EXISTS `test` (id INT UNSIGNED NOT NULL AUTO_INCREMENT, 
PRIMARY KEY (id)) ENGINE=InnoDB DEFAULT CHARSET=utf8"
}
