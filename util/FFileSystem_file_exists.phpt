--TEST--
Ensure FFileSystem::fileExists() returns the path if a file exists.
--FILE--
<?php
require(dirname(__FILE__) . '/../webroot.conf.php');

var_dump(FFileSystem::fileExists('/../webroot.conf.php'));
?>
--EXPECTF--
string(%d) "%s/tests/webroot.conf.php"
