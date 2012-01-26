--TEST--
Ensure FDataModelField::fulltext() works with just a name.
--FILE--
<?php
require(dirname(__FILE__) . '/../../webroot.conf.php');
$f = new FDataModelField();
$f->index('test')->fulltext();
var_dump($f->getDefinition('test'));
?>
--EXPECT--
string(5) "test "
