--TEST--
Ensure formatDate works with date and date/time in textual (English) formats.
--FILE--
<?php
require(dirname(__FILE__) . '/../webroot.conf.php');

$date = 'Tuesday August 9, 2011';
echo FString::formatDate($date) . PHP_EOL;
$date = 'Tuesday August 9, 2011 8:00 pm';
echo FString::formatDate($date) . PHP_EOL;
?>
--EXPECT--
Aug 9, 2011
Aug 9, 2011 8:00 pm