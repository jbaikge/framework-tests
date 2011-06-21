--TEST--
Ensure FObject::getModel() requires a definition.
--FILE--
<?php
require(dirname(__FILE__) . '/../../webroot.conf.php');

class MyObject extends FObject {}
?>
--EXPECTF--
Fatal error: Class MyObject contains 1 abstract method and must therefore be declared abstract or implement the remaining methods (FObject::getModel) %s
