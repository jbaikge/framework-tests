--TEST--
Ensure FModelManager::__construct instantiates correctly when a single field is provided.
--FILE--
<?php
require(dirname(__FILE__) . '/../../webroot.conf.php');

$model = new FModelManager(FField::make('test'));
var_dump($model->getFieldNames());
?>
--EXPECT--
array(1) {
  [0]=>
  string(4) "test"
}
