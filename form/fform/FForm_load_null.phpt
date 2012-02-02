--TEST--
Ensure FForm::populate from instance loads a null value for fields without data assigned
--DESCRIPTION--
This tests the FForm::populate method via FFormFactory::fromClass();
--FILE--
<?php
require_once(dirname(__FILE__) . '/../../webroot.conf.php');

class dummy extends FObject implements FFormProcessable {
	public static function getModel() {
		return new FModelManager(array(
			FField::make('test1')
				->form_options()
					->type('FFormField'),
			FField::make('test2')
				->form_options()
					->type('FFormField'),
		));
	}
}
$object = new dummy(array('test1'=>'Unit'));
$form = FFormFactory::fromInstance($object);
var_dump($form->valid());
?>
--EXPECT--
bool(false)
