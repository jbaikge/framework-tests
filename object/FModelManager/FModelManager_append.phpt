--TEST--
Ensure FModelManager::append attaches additional fields properly.
--FILE--
<?php
require(dirname(__FILE__) . '/../../webroot.conf.php');

$model = new FModelManager(FField::make('test'));
$before = $model->getFieldNames();
$model->append(FField::make('addition'));
var_dump($before, $model->getFieldNames());
?>
--EXPECT--
array(1) {
  [0]=>
  string(4) "test"
}
array(2) {
  [0]=>
  string(4) "test"
  [1]=>
  string(8) "addition"
}
