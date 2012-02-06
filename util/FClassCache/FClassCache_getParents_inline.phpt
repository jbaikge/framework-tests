--TEST--
Ensure FClassCache::getParents returns an array of inline parent objects for the supplied class.
--FILE--
<?php
require(dirname(__FILE__) . '/../../webroot.conf.php');
// Create a dummy class
class dummy extends FObject {
	public static function getModel() {
		return new FModelManager(
			FField::make('dummy_test')
		);
	}
}
// Trigger the class_cache to load.
FClassCache::classExists('dummy');
var_dump(FClassCache::getParents('dummy'));
// Clear the cache so the next test has a clean start
FClassCache::clear();
?>
--EXPECT--
array(1) {
  ["FObject"]=>
  string(7) "FObject"
}
