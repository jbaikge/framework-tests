--TEST--
Ensure FModelManager::storage_xml_salesforce() returns stacked options.
--FILE--
<?php
require(dirname(__FILE__) . '/../../webroot.conf.php');
require(dirname(__FILE__) . '/../definition.php');

$model = new FModelManager($definition);
var_dump($model->storage_xml_salesforce());
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
  array(4) {
    ["timestamp"]=>
    bool(true)
    ["insertOnly"]=>
    bool(true)
    ["disabled"]=>
    bool(true)
    ["ignore"]=>
    bool(true)
  }
  ["body"]=>
  array(1) {
    ["longtext"]=>
    bool(true)
  }
}
