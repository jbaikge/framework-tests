--TEST--
Build top-level contexts
--FILE--
<?php
require(dirname(__FILE__) . '/../../webroot.conf.php');

$field = FField::make('test')
	->global_value('global value')
	->context1_options()
		->option1('value1')
		->other_option1('other_value1')
	->context2_options()
		->option2('value2')
		->other_option2('other_value2')
;
var_dump(
	$field->getData(),
	$field->getData('context1'),
	$field->getData('context2')
);
?>
--EXPECT--
array(1) {
  ["global_value"]=>
  string(12) "global value"
}
array(3) {
  ["global_value"]=>
  string(12) "global value"
  ["option1"]=>
  string(6) "value1"
  ["other_option1"]=>
  string(12) "other_value1"
}
array(3) {
  ["global_value"]=>
  string(12) "global value"
  ["option2"]=>
  string(6) "value2"
  ["other_option2"]=>
  string(12) "other_value2"
}
