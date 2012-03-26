--TEST--
Ensure FMySQLiResult::seek returns data.
--SKIPIF--
<?php
require_once(dirname(__FILE__) . '/../skipif.php');
?>
--FILE--
<?php
// The following include preps and connects to the database.
require_once (dirname(__FILE__) . '/../FDB_test_tables.php');

$result = FDB::query("SELECT * FROM fdb_test");
$first = $result->fetch();
$result->seek(1);
$sought = $result->fetch();
var_dump($first->id, $sought->id);
// Cleans up our mess for the next tests
fdb_test_clean();
?>
--EXPECT--
string(1) "1"
string(1) "3"
