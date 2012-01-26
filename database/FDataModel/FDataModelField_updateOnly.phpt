--TEST--
Ensure FDataModelField::updateOnly() works with just a name.
--FILE--
<?php
require(dirname(__FILE__) . '/../../webroot.conf.php');
$f = new FDataModelField();
$f->index('test')->updateOnly();
var_dump($f->getDefinition('test'));
?>
--EXPECT--
string(5) "test "
