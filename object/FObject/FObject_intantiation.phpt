--TEST--
Ensure the FObject class cannot be instantiated.
--FILE--
<?php
require(dirname(__FILE__) . '/../../webroot.conf.php');
$object = new FObject();
?>
--EXPECTF--
Fatal error: Cannot instantiate abstract class FObject %s
