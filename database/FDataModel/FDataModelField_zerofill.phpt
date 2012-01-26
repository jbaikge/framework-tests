--TEST--
Ensure FDataModelField::zeroFill() works with just a name.
--FILE--
<?php
require(dirname(__FILE__) . '/../../webroot.conf.php');
$f = new FDataModelField();
$f->index('test')->type = 'BIGINT';
$f->zeroFill();
var_dump($f->getDefinition('test'));
?>
--EXPECT--
string(20) "test BIGINT ZEROFILL"
