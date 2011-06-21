--TEST--
Ensure the FObjectDriver class cannot be instantiated.
--FILE--
<?php
require(dirname(__FILE__) . '/../../webroot.conf.php');
$object = new FObjectDriver();
?>
--EXPECTF--
Fatal error: Cannot instantiate abstract class FObjectDriver %s
