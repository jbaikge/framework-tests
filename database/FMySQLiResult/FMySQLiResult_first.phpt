--TEST--
Ensure FMySQLiResult::first goes to the first result.
--SKIPIF--
<?php
require_once(dirname(__FILE__) . '/../skipif.php');
?>
--FILE--
<?php
// The following include preps and connects to the database.
require_once (dirname(__FILE__) . '/../FDB_test_tables.php');

$result = FDB::query("SELECT * FROM fdb_test");
$result->first();
$sought = $result->fetch();
var_dump($sought->id);
// Cleans up our mess for the next tests
fdb_test_clean();
?>
--EXPECTF--
string(1) "1"
