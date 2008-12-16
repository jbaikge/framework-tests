--TEST--
Verify FTemplate::fetchCached() is faster than FTemplate::fetch().
--FILE--
<?php
require('codeloader.php');

var_dump(filesize('templates/fetched.html.php') == filesize('templates/cached.html.php'));

// Ensure the FTemplate class has been loaded.
FTemplate::fetch('templates/test.html.php');

$fetch_start = microtime(true);
for ($i = 0; $i < 1000; $i++) {
	FTemplate::fetch('templates/fetched.html.php');
}
$fetch_duration = microtime(true) - $fetch_start;
unset($fetch_start);

$cache_start = microtime(true);
for ($i = 0; $i < 1000; $i++) {
	FTemplate::fetchCached('templates/cached.html.php');
}
$cache_duration = microtime(true) - $cache_start;
unset($cache_start);

var_dump($fetch_duration, $cache_duration);
var_dump($fetch_duration > $cache_duration);
?>
--EXPECTF--
bool(true)
float(%f)
float(%f)
bool(true)
