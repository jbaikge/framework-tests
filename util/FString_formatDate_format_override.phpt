--TEST--
Ensure formatDate uses $format_override if provided.
--FILE--
<?php
require(dirname(__FILE__) . '/../webroot.conf.php');

echo FString::formatDate('Aug 9, 2011') . PHP_EOL;
echo FString::formatDate('Aug 9, 2011', 'Y-m-d/H:i:s') . PHP_EOL;
echo FString::formatDate('Aug 9, 2011 13:37', 'Y-m-d/H:i:s') . PHP_EOL;
?>
--EXPECT--
Aug 9, 2011
2011-08-09/00:00:00
2011-08-09/13:37:00
