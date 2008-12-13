--TEST--
Verify an FDB object cannot be constructed.
--FILE--
<?php
require('codeloader.php');
$db = new FDB();
?>
--EXPECTF--
Fatal error: %s
