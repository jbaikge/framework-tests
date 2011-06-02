--TEST--
Ensure FModelManager::storage_xml() returns combined options defined globally, for storage, and for storage_xml.
--FILE--
<?php
require(dirname(__FILE__) . '/../webroot.conf.php');
require(dirname(__FILE__) . '/definition.php');

$model = new FModelManager($definition);
var_dump($model->storage_xml());
?>
--EXPECT--
array(5) {
  ["author"]=>
  array(1) {
    ["foreignKey"]=>
    string(4) "User"
  }
  ["title"]=>
  array(2) {
    ["length"]=>
    int(150)
    ["cdata"]=>
    bool(true)
  }
  ["url"]=>
  array(0) {
  }
  ["date"]=>
  array(3) {
    ["timestamp"]=>
    bool(true)
    ["insertOnly"]=>
    bool(true)
    ["disabled"]=>
    bool(true)
  }
  ["body"]=>
  array(1) {
    ["longtext"]=>
    bool(true)
  }
}
