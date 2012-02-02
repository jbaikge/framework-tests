--TEST--
Ensure FDataModelField properly generates enumerated values when specificed for a field.
--FILE--
<?php
require(dirname(__FILE__) . '/../../webroot.conf.php');
$f = new FDataModelField();
$f->index('test')->fullText();
$f->enumValues = array(1,2,3);
var_dump($f->getDefinition('test'));
?>
--EXPECTF--
string(%d) "test ('1','2','3')"
