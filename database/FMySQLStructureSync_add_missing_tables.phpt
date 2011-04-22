--TEST--
Ensure FMySQLStructureSync::addMissingTables() works.
--FILE--
<?php
require('codeloader.php');
require('config.php');

$_ENV['config'] = array_merge($_ENV['config'], $single_config);

FDB::connect();
FDB::query('DROP TABLE IF EXISTS aardvarks, inno2, inno1, table1');

$sync = new FMySQLStructureSync();

// 4 CREATEs and 2 INSERTs
var_dump($sync->addMissingTables());
// Nothing should happen
var_dump($sync->addMissingTables());

try {
	// This will fail since aardvark has a foreign key pointed to inno2
	FDB::query('DROP TABLE IF EXISTS inno2');
} catch (Exception $e) {
	echo $e->getMessage() . NEWLINE;
}
// Nothing should happen
var_dump($sync->addMissingTables());

FDB::query('DROP TABLE IF EXISTS aardvarks, inno2');
// 2 CREATEs and 1 INSERT
var_dump($sync->addMissingTables());
?>
--EXPECT--
int(6)
int(0)
Cannot delete or update a parent row: a foreign key constraint fails<br>int(0)
int(3)
