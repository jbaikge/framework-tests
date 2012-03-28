--TEST--
FMySQLiResult->asClass("MyClass")->all() returns all data.
--SKIPIF--
<?php
require_once(dirname(__FILE__) . '/../skipif.php');
?>
--FILE--
<?php
require_once (dirname(__FILE__) . '/../FDB_test_tables.php');

class MyClass {
	public $id;
	public $data;
	function __construct($data) {
		list($this->id, $this->data) = array_values($data);
	}
}
var_dump($test = FDB::query("SELECT id, data FROM fdb_test ORDER BY id")->asClass('MyClass')->all());

?>
--EXPECTF--
array(3) {
  [0]=>
  object(MyClass)#%d (2) {
    ["id"]=>
    string(1) "1"
    ["data"]=>
    string(6) "test 1"
  }
  [1]=>
  object(MyClass)#%d (2) {
    ["id"]=>
    string(1) "2"
    ["data"]=>
    string(6) "test 2"
  }
  [2]=>
  object(MyClass)#%d (2) {
    ["id"]=>
    string(1) "3"
    ["data"]=>
    string(6) "test 3"
  }
}