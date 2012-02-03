--TEST--
Ensure FDB::query properly performs string replacement when arguments are passed.
--SKIPIF--
<?php
require_once(dirname(__FILE__) . '/../skipif.php');
?>
--FILE--
<?php
// The following include preps and connects to the database.
require_once (dirname(__FILE__) . '/../FDB_test_tables.php');
var_dump(FDB::query("SELECT * FROM fdb_test WHERE data IN('%s', '%s')", array('test 1', 'test 2')));
// Cleans up our mess for the next tests
fdb_test_clean();
?>
--EXPECTF--
object(FMySQLiResult)#%d (5) {
  ["current_field"]=>
  int(0)
  ["field_count"]=>
  int(%d)
  ["lengths"]=>
  NULL
  ["num_rows"]=>
  int(%d)
  ["type"]=>
  int(0)
}
