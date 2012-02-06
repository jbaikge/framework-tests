--TEST--
Ensure FFormInstance::populatedObject returns a form processable object with field changes populated.
--POST--
test_field=This is a test
--FILE--
<?php
require_once(dirname(__FILE__) . '/../../webroot.conf.php');

class dummy extends FObject implements FFormProcessable {
	public static function getModel() {
		return new FModelManager(array(
			FField::make('test_field')
				->form_options()
					->type('FTextField')
		));
	}
}

$form = FFormFactory::fromInstance(new dummy());
if($form->loadAndValidate()) {
	var_dump($form->populatedObject());
}
?>
--EXPECT--
object(dummy)#1 (4) {
  ["changes":"FObject":private]=>
  array(1) {
    ["test_field"]=>
    NULL
  }
  ["data":"FObject":private]=>
  array(1) {
    ["test_field"]=>
    string(14) "This is a test"
  }
  ["observers":"FObject":private]=>
  array(2) {
    ["hooks"]=>
    array(0) {
    }
    ["methods"]=>
    array(1) {
      ["makeFields"]=>
      string(22) "FFormProcessableDriver"
    }
  }
  ["observerInstances":"FObject":private]=>
  array(1) {
    ["FFormProcessableDriver"]=>
    object(FFormProcessableDriver)#5 (1) {
      ["subject":protected]=>
      *RECURSION*
    }
  }
}
