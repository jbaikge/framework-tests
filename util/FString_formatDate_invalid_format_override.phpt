--TEST--
Ensure formatDate defaults to the date/time format specified in the config if the $format_override is empty.
--FILE--
<?php
require(dirname(__FILE__) . '/../webroot.conf.php');

echo FString::formatDate('Aug 9, 2011', '') . PHP_EOL;
?>
--EXPECT--
Aug 9, 2011
