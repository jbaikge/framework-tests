--TEST--
Ensure FFormFactory::make creates the basic object from the supplied class name.
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
var_dump($form->makeFields());
?>
--EXPECTF--
array(1) {
  ["test_field"]=>
  object(FTextField)#%d (5) {
    ["filter":protected]=>
    int(513)
    ["raw":"FFormField":private]=>
    NULL
    ["value":"FFormField":private]=>
    NULL
    ["attributes":"FFormUtils":private]=>
    array(2) {
      ["name"]=>
      string(10) "test_field"
      ["filter"]=>
      int(513)
    }
    ["template":protected]=>
    string(98) "/home/mark/projects/code/com/framework/form/lib/framework/form/field/templates/FTextField.html.php"
  }
}
