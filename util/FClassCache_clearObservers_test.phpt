--TEST--
Ensure FClassCache::clearObservers executes if a class file has been modified since the initial cache creation.
--FILE--
<?php
// Create two test files. One interface and one class
$fcct_t_a = dirname(__FILE__) . '/../../util/TestClass.class.php';
$fcct_i_a = dirname(__FILE__) . '/../../util/DummyInterface.interface.php';
$fcct_i_b = dirname(__FILE__) . '/../../util/InterfaceA.interface.php';

$mod = (time() + 100000);
file_put_contents($fcct_t_a, '// Blah', FILE_APPEND);
touch($fcct_t_a, $mod, time());
file_put_contents($fcct_i_a, '// Blah', FILE_APPEND);
touch($fcct_i_a, $mod, time());
file_put_contents($fcct_i_b, '// Blah', FILE_APPEND);
touch($fcct_i_b, $mod, time());

// Load webroot
require(dirname(__FILE__) . '/../webroot.conf.php');
var_dump(FClassCache::autoload('InterfaceA'));
var_dump(FClassCache::autoload('DummyInterface'));
var_dump(FClassCache::autoload('TestClass'));
var_dump(TestClass::thing());

// Clean up our mess.
unlink($fcct_t_a);
unlink($fcct_i_a);
unlink($fcct_i_b);

// Clear the cache so the next test has a clean start
FClassCache::clear();
?>
--EXPECT--
bool(true)
bool(true)
bool(true)
bool(true)
