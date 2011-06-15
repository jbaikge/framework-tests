--TEST--
FTemplateUtils::checked() off.
--FILE--
<?php
require(dirname(__FILE__) . '/../webroot.conf.php');

// Mix-matched Types
FTemplateUtils::checked('1',  2    ); echo PHP_EOL;
FTemplateUtils::checked('1',  false); echo PHP_EOL;
FTemplateUtils::checked(1,    '2'  ); echo PHP_EOL;
FTemplateUtils::checked(1,    false); echo PHP_EOL;
FTemplateUtils::checked(true, '2'  ); echo PHP_EOL;
FTemplateUtils::checked(true, 2    ); echo PHP_EOL;
?>
--EXPECT--
