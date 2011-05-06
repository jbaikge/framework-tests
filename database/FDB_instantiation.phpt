--TEST--
Verify an FDB object cannot be constructed.
--FILE--
<?php
define('DATABASE', 'single');
require(dirname(__FILE__) . '/../webroot.conf.php');

$db = new FDB();
?>
--EXPECTF--
Fatal error: %s
