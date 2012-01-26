--TEST--
Ensure FDataModel::setTableQueries() accepts valid args.
--FILE--
<?php
require(dirname(__FILE__) . '/../../webroot.conf.php');
FDataModel::setTableQueries(array(
	'test' => array(
		"INSERT INTO test (id) VALUES (1)")
	)
);
var_dump(true);
?>
--EXPECT--
bool(true)
