--TEST--
FTemplateUtils::checked() on.
--FILE--
<?php
require(dirname(__FILE__) . '/../../webroot.conf.php');

// Matching Types
FTemplateUtils::checked(1, 1); echo PHP_EOL;
FTemplateUtils::checked('1', '1'); echo PHP_EOL;
FTemplateUtils::checked(true, true); echo PHP_EOL;
?>
--EXPECT--
 checked="checked"
 checked="checked"
 checked="checked"
