--TEST--
Ensure FDataModelField::updateOnly() works when the field type is defined as a TIMESTAMP.
--FILE--
<?php
require(dirname(__FILE__) . '/../../webroot.conf.php');
$f = new FDataModelField();
$f->index('test')->type = 'TIMESTAMP';
$f->updateOnly();
var_dump($f->getDefinition('test'));
?>
--EXPECT--
string(52) "test TIMESTAMP DEFAULT 0 ON UPDATE CURRENT_TIMESTAMP"
