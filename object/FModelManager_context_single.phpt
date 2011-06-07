--TEST--
Ensure FModelManager::form() returns stacked options.
--FILE--
<?php
require(dirname(__FILE__) . '/../webroot.conf.php');
require(dirname(__FILE__) . '/definition.php');

$model = new FModelManager($definition);
var_dump($model->form());
?>
--EXPECT--
array(5) {
  ["author"]=>
  array(0) {
  }
  ["title"]=>
  array(1) {
    ["length"]=>
    int(150)
  }
  ["url"]=>
  array(1) {
    ["type"]=>
    string(9) "FURLField"
  }
  ["date"]=>
  array(6) {
    ["timestamp"]=>
    bool(true)
    ["insertOnly"]=>
    bool(true)
    ["disabled"]=>
    bool(true)
    ["type"]=>
    string(18) "FFreeFormDateField"
    ["label"]=>
    string(9) "News Date"
    ["default"]=>
    string(3) "now"
  }
  ["body"]=>
  array(1) {
    ["longtext"]=>
    bool(true)
  }
}
