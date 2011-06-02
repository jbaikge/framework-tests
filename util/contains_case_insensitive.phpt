--TEST--
Ensure String::contains() works with case insensitivity.
--FILE--
<?php
require(dirname(__FILE__) . '/../webroot.conf.php');

$haystack = "Lorem ipsum dolor sit amet";
$good_needle = "Lorem";
$upper_needle = strtoupper($good_needle);
$bad_needle = "amot";

$tests = array(
	'Haystack contains needle' => array($haystack, $good_needle),
	'Haystack contains uppercase needle' => array($haystack, $upper_needle),
	'Haystack does not contain bad needle' => array($haystack, $bad_needle),
	'Needle contains uppercase needle' => array($good_needle, $upper_needle)
);

foreach ($tests as $desc => $args) {
	echo "$desc: ";
	var_dump(FString::contains($args[0], $args[1], true));
}
?>
--EXPECT--
Haystack contains needle: bool(true)
Haystack contains uppercase needle: bool(true)
Haystack does not contain bad needle: bool(false)
Needle contains uppercase needle: bool(true)
