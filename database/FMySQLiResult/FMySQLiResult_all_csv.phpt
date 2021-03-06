--TEST--
FMySQLiResult->asCSV()->all() returns all data.
--SKIPIF--
<?php
require_once(dirname(__FILE__) . '/../skipif.php');
?>
--FILE--
<?php
require_once (dirname(__FILE__) . '/../FDB_test_tables.php');

var_dump(FDB::query("SELECT id, data FROM fdb_test ORDER BY id")->asCSV()->all());

?>
--EXPECT--
array(3) {
  [0]=>
  string(11) "1,"test 1"
"
  [1]=>
  string(11) "2,"test 2"
"
  [2]=>
  string(11) "3,"test 3"
"
}
