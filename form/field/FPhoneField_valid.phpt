--TEST--
FPhoneField valid values
--FILE--
<?php
require(dirname(__FILE__) . '/../../webroot.conf.php');

$valid = explode("\n", trim("
	1234567
	123.4567
	123-4567
	123 4567
	123~4567
	123,4567
	123 omg the other half is 4567
	123-4567.

	1234567890
	123 456 7890
	123-456-7890
	123.456.7890
	(123) 456-7890
	Area code: 123, Phone number: 456-7890
	123-456-7890.
	1a2s3d4f5g6h7j8k9l0p

	1234567x123
	123-4567 x123
	123 4567 ext 123
	123 4567 ext. 123
	123.4567 ext. 123
	1234567 xxxxxxxxxxxxxxxxxxx123
	1234567 xxx xxxx   xxxxxxx xx xxx123

	1234567890x123
	1234567890 ext123
	(123) 456-7890 ext 123
	(123) 456-7890 ext. 123
	(123) 456-7890 extension 123
	123-456-7890 and any extension except 123
"));

$field = new FPhoneField('test');
foreach ($valid as $number) {
	if (trim($number) == '') {
		continue;
	}
	list($valid, $value) = $field->loadAndValidate($number);
	printf("%-17s <- %s\n", $value, trim($number));
}
?>
--EXPECT--
123.4567          <- 1234567
123.4567          <- 123.4567
123.4567          <- 123-4567
123.4567          <- 123 4567
123.4567          <- 123~4567
123.4567          <- 123,4567
123.4567          <- 123 omg the other half is 4567
123.4567          <- 123-4567.
123.456.7890      <- 1234567890
123.456.7890      <- 123 456 7890
123.456.7890      <- 123-456-7890
123.456.7890      <- 123.456.7890
123.456.7890      <- (123) 456-7890
123.456.7890      <- Area code: 123, Phone number: 456-7890
123.456.7890      <- 123-456-7890.
123.456.7890      <- 1a2s3d4f5g6h7j8k9l0p
123.4567 x123     <- 1234567x123
123.4567 x123     <- 123-4567 x123
123.4567 x123     <- 123 4567 ext 123
123.4567 x123     <- 123 4567 ext. 123
123.4567 x123     <- 123.4567 ext. 123
123.4567 x123     <- 1234567 xxxxxxxxxxxxxxxxxxx123
123.4567 x123     <- 1234567 xxx xxxx   xxxxxxx xx xxx123
123.456.7890 x123 <- 1234567890x123
123.456.7890 x123 <- 1234567890 ext123
123.456.7890 x123 <- (123) 456-7890 ext 123
123.456.7890 x123 <- (123) 456-7890 ext. 123
123.456.7890 x123 <- (123) 456-7890 extension 123
123.456.7890 x123 <- 123-456-7890 and any extension except 123
