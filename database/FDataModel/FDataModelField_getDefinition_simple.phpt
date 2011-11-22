--TEST--
Ensure FDataModelField::getDefinition() works with just a name.
--FILE--
<?php
require(dirname(__FILE__) . '/../../webroot.conf.php');
$f = new FDataModelField();
var_dump($f->getDefinition('test'));
?>
--EXPECT--
string(5) "test "
