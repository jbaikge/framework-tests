--TEST--
Ensure FFormUtils::setAttributes assigns supplied values to form attributes.
--FILE--
<?php
require_once(dirname(__FILE__) . '/../../webroot.conf.php');

class dummy extends FObject implements FFormProcessable {
	public static function getModel() {
		return new FModelManager(array(
			FField::make('test_field'),
		));
	}
}

$form = FFormFactory::fromClass('dummy');
$form->setAttributes(
	array(
		'method'=>'post',
		'action'=>'somepage'
	)
);
var_dump($form->get('method'), $form->get('action'));
?>
--EXPECT--
string(4) "post"
string(8) "somepage"
