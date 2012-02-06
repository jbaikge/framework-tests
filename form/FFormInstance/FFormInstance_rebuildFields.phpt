--TEST--
Ensure FFormInstance::rebuildFields works.
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
if ($form->loadAndValidate()) {
	$form->rebuildFields();
	var_dump($form);
}
?>
--EXPECTF--
object(FFormInstance)#%d (5) {
  ["instance":"FFormInstance":private]=>
  object(dummy)#%d (4) {
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
      array(1) {
        ["makeFields"]=>
        string(22) "FFormProcessableDriver"
      }
    }
    ["observerInstances":"FObject":private]=>
    array(1) {
      ["FFormProcessableDriver"]=>
      object(FFormProcessableDriver)#%d (1) {
        ["subject":protected]=>
        *RECURSION*
      }
    }
  }
  ["data":protected]=>
  array(1) {
    ["test_field"]=>
    NULL
  }
  ["cleanData":protected]=>
  array(1) {
    ["test_field"]=>
    string(14) "This is a test"
  }
  ["attributes":"FFormUtils":private]=>
  array(2) {
    ["_cacheValid"]=>
    bool(false)
    ["_fieldCache"]=>
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
  }
  ["template":protected]=>
  string(87) "/home/mark/projects/code/com/framework/form/lib/framework/form/templates/FForm.html.php"
}
