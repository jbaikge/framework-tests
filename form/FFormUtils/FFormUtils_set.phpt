--TEST--
Ensure FFormUtils::set assigns supplied values to form attributes.
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
$form->set('method', 'post');
var_dump($form->get('method'));
?>
--EXPECT--
string(4) "post"
