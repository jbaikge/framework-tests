--TEST--
FMySQLiResult->asAssoc()->all() returns all data.
--SKIPIF--
<?php
require_once(dirname(__FILE__) . '/../skipif.php');
?>
--FILE--
<?php
require_once (dirname(__FILE__) . '/../FDB_test_tables.php');

var_dump(FDB::query("SELECT id, data FROM fdb_test ORDER BY id")->asAssoc()->all());

?>
--EXPECT--
array(3) {
  [0]=>
  array(2) {
    ["id"]=>
    string(1) "1"
    ["data"]=>
    string(6) "test 1"
  }
  [1]=>
  array(2) {
    ["id"]=>
    string(1) "2"
    ["data"]=>
    string(6) "test 2"
  }
  [2]=>
  array(2) {
    ["id"]=>
    string(1) "3"
    ["data"]=>
    string(6) "test 3"
  }
}
