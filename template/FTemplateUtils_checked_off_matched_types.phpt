--TEST--
FTemplateUtils::checked() off.
--FILE--
<?php
require(dirname(__FILE__) . '/../webroot.conf.php');

// Matching Types
FTemplateUtils::checked(1, 2); echo PHP_EOL;
FTemplateUtils::checked('1', '2'); echo PHP_EOL;
FTemplateUtils::checked(true, false); echo PHP_EOL;
?>
--EXPECT--
