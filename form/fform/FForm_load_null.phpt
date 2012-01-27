--TEST--
Ensure FForm::populate throws exception when data hasn't been validated prior.
--DESCRIPTION--
This tests the FForm::populate method via FFormFactory::fromClass();
--SKIPIF--
<?php
if (php_sapi_name()=='cli') die ('Must be run in CGI mode');
?>
--POST--
test_field=This should blow up
--FILE--
<?php
require_once(dirname(__FILE__) . '/../../webroot.conf.php');

class dummy extends FObject implements FFormProcessable {
	public static function getModel() {
		return new FModelManager(array(
			FField::make('test_field')
				->form_options()
					->type('FEmailField'),
		));
	}
}

$form = FFormFactory::fromClass('dummy');
$form->load(array('blah'=>'boom'));
var_dump($form->valid());
?>
--EXPECT--
bool(false)

