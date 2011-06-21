--TEST--
Ensure FModelManager::global() returns only globally defined options.
--FILE--
<?php
require(dirname(__FILE__) . '/../webroot.conf.php');
require(dirname(__FILE__) . '/definition.php');

$model = new FModelManager($definition);
var_dump($model->global());
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
  array(0) {
  }
  ["date"]=>
  array(2) {
    ["timestamp"]=>
    bool(true)
    ["insertOnly"]=>
    bool(true)
  }
  ["body"]=>
  array(1) {
    ["longtext"]=>
    bool(true)
  }
}
