--TEST--
Ensure FObjectViewBuilder::getAlterQueries creates the proper SQL when an object field is cast.
--DESCRIPTION--
This test attempts to generate the proper alter queries. To do this, we tell the 
framework to use the q tables and then execute buildViews on an object that has 
a field with cast options.
--SKIPIF--
<?php
require(dirname(__FILE__) . '/../../database/skipif.php');
?>
--FILE--
<?php
// Begin testing
define('DATABASE', 'single');
require(dirname(__FILE__) . '/../../webroot.conf.php');

class MySingleCastClass extends FObject implements FObjectDatabaseStorage {
	public static function getModel () {
		return new FModelManager(array(
			FField::make('single_field')
				->storage_options()
					->cast('DATE')
		));
	}
	public function __toString () {
		return 'MySingleCastClass';
	}
	public static function setup () {
		if (FDB::query("SELECT * FROM objects WHERE object_type = 'MySingleCastClass'")->count() <= 0) {
			$temp = new self();
			$temp->single_field = 'April 1, 2012';
			$temp->update();
		}
	}
}

FObjectQuery::updateStructure();
MySingleCastClass::setup();
$FOVB = new FObjectViewBuilder(new MySingleCastClass());
$FOVB->buildViews();
$_ENV['config']['fobject.qtables'] = true;
$FOVB->buildViews();
var_dump($FOVB);
?>
--EXPECTF--
object(FObjectViewBuilder)#%d (%d) {
  ["fields":"FObjectViewBuilder":private]=>
  array(1) {
    ["single_field"]=>
    array(1) {
      ["cast"]=>
      string(%d) "DATE"
    }
  }
  ["previewTable":"FObjectViewBuilder":private]=>
  string(%d) "vp_MySingleCastClass"
  ["type":"FObjectViewBuilder":private]=>
  string(%d) "MySingleCastClass"
  ["viewTable":"FObjectViewBuilder":private]=>
  string(%d) "v_MySingleCastClass"
}
