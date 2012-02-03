--TEST--
Prepares for the FClassCache::clearObservers test.
--FILE--
<?php
// Test interface and class files
$fcct_t_a = dirname(__FILE__) . '/../../util/TestClass.class.php';
$fcct_i_a = dirname(__FILE__) . '/../../util/DummyInterface.interface.php';
$fcct_i_b = dirname(__FILE__) . '/../../util/InterfaceA.interface.php';

file_put_contents($fcct_t_a, 
"<?php 
	class TestClass extends DummyClass implements DummyInterface {
		public static function thing() { return parent::thing(); }
	}
");

file_put_contents($fcct_i_a,
"<?php
	interface DummyInterface extends InterfaceA {}
	class DummyClass extends ClassA {
		public static function thing() { return true; }
	}
");

file_put_contents($fcct_i_b, 
"<?php
	interface InterfaceA {}
	class ClassA {}
");

// Load webroot
require(dirname(__FILE__) . '/../webroot.conf.php');
// Make sure the class cache loads our test interfaces and classes
FClassCache::autoload('InterfaceA');
FClassCache::autoload('DummyInterface');
FClassCache::autoload('TestClass');
var_dump(true);
?>
--EXPECT--
bool(true)
