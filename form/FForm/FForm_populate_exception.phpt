--TEST--
Ensure FForm::populate throws exception when data hasn't been validated prior.
--DESCRIPTION--
This tests the FForm::populate method via FFormFactory::fromClass();
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

$form = FFormFactory::fromClass('dummy');
var_dump($form->populatedObject());
?>
--EXPECTF--
Fatal error: Uncaught exception 'FormException' with message 'Can't update an instance with an invalid form. Did you call FFormInstance::valid() first?'%s
