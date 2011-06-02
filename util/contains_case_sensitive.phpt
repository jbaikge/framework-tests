--TEST--
Ensure String::contains() works with case sensitivity.
--FILE--
<?php
require(dirname(__FILE__) . '/../webroot.conf.php');

$haystack = "Lorem ipsum dolor sit amet";
$good_needle = "Lorem";
$upper_needle = strtoupper($good_needle);
$bad_needle = "amot";

// Case-Sensitive Tests
$tests = array(
	'Haystack contains needle' => array($haystack, $good_needle),
	'Haystack does not contain uppercase needle' => array($haystack, strtoupper($good_needle)),
	'Haystack does not contain bad needle' => array($haystack, $bad_needle),
	'Blank haystack does not contain needle' => array('', $good_needle),
	'Haystack contains blank needle' => array($haystack, ''),
	'Blank haystack contains blank needle' => array('', ''),
	'Haystack equals needle' => array($haystack, $haystack),
	'Needle does not contain haystack' => array($good_needle, $haystack)
);

foreach ($tests as $desc => $args) {
	echo "$desc: ";
	var_dump(FString::contains($args[0], $args[1]));
}
?>
--EXPECT--
Haystack contains needle: bool(true)
Haystack does not contain uppercase needle: bool(false)
Haystack does not contain bad needle: bool(false)
Blank haystack does not contain needle: bool(false)
Haystack contains blank needle: bool(true)
Blank haystack contains blank needle: bool(true)
Haystack equals needle: bool(true)
Needle does not contain haystack: bool(false)
