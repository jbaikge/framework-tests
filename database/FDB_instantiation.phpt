--TEST--
Verify an FDB object cannot be constructed.
--SKIPIF--
<?php
require(dirname(__FILE__) . '/skipif.php');
?>
--FILE--
<?php
define('DATABASE', 'single');
require(dirname(__FILE__) . '/../webroot.conf.php');

$db = new FDB();
?>
--EXPECTF--
Fatal error: %s
