--TEST--
Ensure FFileSystem returns false if a file does not exist.
--FILE--
<?php
require(dirname(__FILE__) . '/../webroot.conf.php');

var_dump(FFileSystem::fileExists('../dummyfile'));
?>
--EXPECT--
bool(false)
