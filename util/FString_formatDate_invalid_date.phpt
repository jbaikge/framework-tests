--TEST--
Ensure formatDate returns the Epoch on invalid date input.
--FILE--
<?php
require(dirname(__FILE__) . '/../webroot.conf.php');

echo FString::formatDate('Aug. 32, 1982') . PHP_EOL;
echo FString::formatDate('Frb 28, 1982') . PHP_EOL;
echo FString::formatDate('Jan. 9, 19754') . PHP_EOL;
?>
--EXPECT--
Dec 31, 1969 7:00 pm
Dec 31, 1969 7:00 pm
Dec 31, 1969 7:00 pm
