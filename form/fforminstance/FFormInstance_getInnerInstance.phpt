--TEST--
Ensure FFormInstance::getInnerInstance returns its child object.
--FILE--
<?php
require_once(dirname(__FILE__) . '/../../webroot.conf.php');

class dummy extends FObject implements FFormProcessable {
	public static function getModel() {
		return new FModelManager(array(
			FField::make('test_field')
		));
	}
}

$form = FFormFactory::fromInstance(new dummy());
var_dump($form->getInnerInstance());
?>
--EXPECT--
object(dummy)#1 (4) {
  ["changes":"FObject":private]=>
  array(0) {
  }
  ["data":"FObject":private]=>
  array(0) {
  }
  ["observers":"FObject":private]=>
  array(2) {
    ["hooks"]=>
    array(0) {
    }
    ["methods"]=>
    array(0) {
    }
  }
  ["observerInstances":"FObject":private]=>
  array(0) {
  }
}
