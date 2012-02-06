--TEST--
FTemplateUtils::checked() on.
--FILE--
<?php
require(dirname(__FILE__) . '/../../webroot.conf.php');

// Mix-matched Types
FTemplateUtils::checked('1',  1   ); echo PHP_EOL;
FTemplateUtils::checked('1',  true); echo PHP_EOL;
FTemplateUtils::checked(1,    '1' ); echo PHP_EOL;
FTemplateUtils::checked(1,    true); echo PHP_EOL;
FTemplateUtils::checked(true, '1' ); echo PHP_EOL;
FTemplateUtils::checked(true, 1   ); echo PHP_EOL;
?>
--EXPECT--
 checked="checked"
 checked="checked"
 checked="checked"
 checked="checked"
 checked="checked"
 checked="checked"
