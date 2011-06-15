--TEST--
FTemplateUtils::checked() on.
--FILE--
<?php
require(dirname(__FILE__) . '/../webroot.conf.php');

// Blank value, no check
FTemplateUtils::checked(1); echo PHP_EOL;
FTemplateUtils::checked('1'); echo PHP_EOL;
?>
--EXPECT--
 checked="checked"
 checked="checked"
