--TEST--
Ensure FModelManager::getFieldNames() returns correct values.
--FILE--
<?php
require(dirname(__FILE__) . '/../webroot.conf.php');
require(dirname(__FILE__) . '/definition.php');

$model = new FModelManager($definition);
var_dump($model->getFieldNames());
?>
--EXPECT--
array(5) {
  [0]=>
  string(6) "author"
  [1]=>
  string(5) "title"
  [2]=>
  string(3) "url"
  [3]=>
  string(4) "date"
  [4]=>
  string(4) "body"
}
