--TEST--
Ensure FObjectQueryFrom only uses objects table when no attributes specified.
--FILE--
<?php
require(dirname(__FILE__) . '/../webroot.conf.php');

$from = new FObjectQueryFrom('monkey');
print($from->toString());
?>
--EXPECT--
  objects AS monkey
