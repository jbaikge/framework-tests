--TEST--
Ensure FField throws an error when specifying field definitions without an argument.
--FILE--
<?php
require(dirname(__FILE__) . '/../../webroot.conf.php');

FField::make('test')
	->my_options()         // _options, no args required
		->valid_call(true) // Single arg
		->invalid_call();  // Notice, no arg
?>
--EXPECTF--
Fatal error: Must provide exactly one argument to invalid_call. in %s on line %d

