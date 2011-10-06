--TEST--
Ensure an FObjectDatabaseStorage subclass can push and pull data from the database.
--SKIPIF--
<?php
require(dirname(__FILE__) . '/../../database/skipif.php');
?>
--FILE--
<?php
define('DATABASE', 'single');
require(dirname(__FILE__) . '/../../webroot.conf.php');

FObjectQuery::updateStructure();
FDB::query("TRUNCATE objects");
FDB::query("TRUNCATE attributes");

$o = new MyStorageObject();
$o->first_name = 'Test';
$o->last_name = 'Testerly';
$o->random_field = 'Random';
$o->update();

unset($o);

$o1 = new MyStorageObject(1);
var_dump($o1->getData());

?>
--EXPECTF--
array(9) {
  ["first_name"]=>
  string(4) "Test"
  ["last_name"]=>
  string(8) "Testerly"
  ["password"]=>
  NULL
  ["salt"]=>
  NULL
  ["id"]=>
  string(1) "1"
  ["parent_id"]=>
  NULL
  ["creator_id"]=>
  NULL
  ["added"]=>
  string(19) "%d-%d-%d %d:%d:%d"
  ["updated"]=>
  string(19) "%d-%d-%d %d:%d:%d"
}
