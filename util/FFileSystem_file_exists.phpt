--TEST--
Ensure FFileSystem returns the path if a file exists.
--FILE--
<?php
require(dirname(__FILE__) . '/../webroot.conf.php');

var_dump(FFileSystem::fileExists('/../webroot.conf.php'));
?>
--EXPECTF--
string(%d) "%s/framework/tests/webroot.conf.php"
