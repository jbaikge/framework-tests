--TEST--
Verify FTemplate::fetchCached() is faster than FTemplate::fetch().
--FILE--
<?php
require(dirname(__FILE__) . '/../webroot.conf.php');

$test_path = dirname(__FILE__) . '/templates/test.html.php';
$cached_path = dirname(__FILE__) . '/templates/cached.html.php';
$fetched_path = dirname(__FILE__) . '/templates/fetched.html.php';

var_dump(filesize($cached_path) == filesize($fetched_path));

// Ensure the FTemplate class has been loaded.
FTemplate::fetch($test_path);

$fetch_start = microtime(true);
for ($i = 0; $i < 1000; $i++) {
	FTemplate::fetch($fetched_path);
}
$fetch_duration = microtime(true) - $fetch_start;
unset($fetch_start);

$cache_start = microtime(true);
for ($i = 0; $i < 1000; $i++) {
	FTemplate::fetchCached($cached_path);
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
