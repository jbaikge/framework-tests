--TEST--
FTemplateUtils::checked() off.
--FILE--
<?php
require(dirname(__FILE__) . '/../webroot.conf.php');

// Blank value, no check
FTemplateUtils::checked(null); echo PHP_EOL;
?>
--EXPECT--
