--TEST--
Ensure FMySQLiResult::asClass returns a class object.
--SKIPIF--
<?php
require_once(dirname(__FILE__) . '/../skipif.php');
?>
--FILE--
<?php
// Dummy class
class thing {
	public $data = array();
	public function __construct($data) {
		$this->data = $data;
	}
}
// The following include preps and connects to the database.
require_once (dirname(__FILE__) . '/../FDB_test_tables.php');

$object = FDB::query("SELECT * FROM fdb_test WHERE data = 'test 1'")->asClass('thing')->fetch();
var_dump($object->data);
// Cleans up our mess for the next tests
fdb_test_clean();
?>
--EXPECTF--
array(2) {
  ["id"]=>
  string(1) "1"
  ["data"]=>
  string(6) "test 1"
}
