--TEST--
Ensure FObjectViewBuilder::_construct returns an object of type FObjectViewBuilder.
--DESCRIPTION--
This test is odd because it will return two exceptions. One from FObjectViewBuilder and one from FDB.
--SKIPIF--
<?php
require(dirname(__FILE__) . '/../../database/skipif.php');
?>
--FILE--
<?php
// Begin testing
define('DATABASE', 'single');
require(dirname(__FILE__) . '/../../webroot.conf.php');

// Sample class for this test
class MySingleAttributeClass extends FObject implements FObjectDatabaseStorage {
	public static function getModel () {
		return new FModelManager(array(
			FField::make('single_field')
				->storage_options()
					->cast('VARCHAR')
		));
	}

	public function __toString () {
		return 'MySingleAttributeClass';
	}

	public static function setup () {
		if (FDB::query("SELECT * FROM objects WHERE object_type = 'MySingleAttributeClass'")->count() <= 0) {
			$temp = new self();
			$temp->single_field = 'single attribute';
			$temp->update();
		}
	}
}

FObjectQuery::updateStructure();
MySingleAttributeClass::setup();
$FOVB = new FObjectViewBuilder(new MySingleAttributeClass());
@$FOVB->buildViews();
?>
--EXPECTF--
Fatal error: Uncaught exception 'Exception'%s
