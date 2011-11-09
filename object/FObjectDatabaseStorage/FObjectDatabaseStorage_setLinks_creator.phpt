--TEST--
Ensure FObjectDatabaseStorageDriver::setLinks() sets creator_id
--SKIPIF--
<?php
require(dirname(__FILE__) . '/../../database/skipif.php');
?>
--FILE--
<?php
define('DATABASE', 'single');
require(dirname(__FILE__) . '/../../webroot.conf.php');

FDB::query("TRUNCATE objects");

$o1 = new MyStorageObject();
$o1->first_name = 'First1';
$o1->last_name = 'Last1';
$o1->update();

$o2 = new MyStorageObject();
$o2->first_name = 'First2';
$o2->last_name = 'Last2';
$o2->creator_id = $o1->id;
$o2->update();

var_dump(iterator_to_array(FDB::query("SELECT object_id, object_creator_id FROM objects ORDER BY object_id")->asRow()));
?>
--EXPECT--
array(2) {
  [0]=>
  array(2) {
    [0]=>
    string(1) "1"
    [1]=>
    NULL
  }
  [1]=>
  array(2) {
    [0]=>
    string(1) "2"
    [1]=>
    string(1) "1"
  }
}

