--TEST--
Ensure FField throws an error when specifying field definitions without an argument.
--FILE--
<?php
require(dirname(__FILE__) . '/../../webroot.conf.php');

try {
	FField::make('test')
		->my_options()         // _options, no args required
			->valid_call(true) // Single arg
			->invalid_call();  // Notice, no arg
	var_dump(false);
} catch (InvalidArgumentException $iae) {
	var_dump(true);
}
?>
--EXPECT--
bool(true)
