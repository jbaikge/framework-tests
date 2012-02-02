--TEST--
Ensure FMySQLiResult::seek returns an exception when the index sought is out of bounds.
--SKIPIF--
<?php
require_once(dirname(__FILE__) . '/../skipif.php');
?>
--FILE--
<?php
// The following include preps and connects to the database.
require_once (dirname(__FILE__) . '/../FDB_test_tables.php');

$result = FDB::query("SELECT * FROM fdb_test");
$past_last = $result->count() + 1;
$result->seek($past_last);
$sought = $result->fetch();
var_dump($first->id, $sought->id);
// Cleans up our mess for the next tests
fdb_test_clean();
?>
--EXPECTF--
Fatal error: Uncaught exception 'OutOfBoundsException'%s
