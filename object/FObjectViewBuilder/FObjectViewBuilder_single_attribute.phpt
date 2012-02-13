--TEST--
Ensure FObjectViewBuilder::_construct returns an object of type FObjectViewBuilder.
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
echo $FOVB->getSelectClause();
?>
--EXPECT--
SELECT MySingleAttributeClass.object_id, 
  MySingleAttributeClass.object_parent_id, 
  MySingleAttributeClass.object_creator_id, 
  a_single_field.attribute_value, 
  MySingleAttributeClass.object_added, 
  a_single_field.attribute_added
