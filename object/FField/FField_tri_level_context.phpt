--TEST--
Build contexts that inherit (3-levels)
--FILE--
<?php
require(dirname(__FILE__) . '/../../webroot.conf.php');

$field = FField::make('test')
	->global_value('global value')
	->context_options()
		->field('value')
	->context_sub_options()
		->sub_field('sub value')
	->context_sub_trilevel_options()
		->trilevel_field('third level nesting')
;
var_dump(
	$field->getData(),
	$field->getData('context'),
	$field->getData('context_sub'),
	$field->getData('context_sub_trilevel')
);
?>
--EXPECT--
array(1) {
  ["global_value"]=>
  string(12) "global value"
}
array(2) {
  ["global_value"]=>
  string(12) "global value"
  ["field"]=>
  string(5) "value"
}
array(3) {
  ["global_value"]=>
  string(12) "global value"
  ["field"]=>
  string(5) "value"
  ["sub_field"]=>
  string(9) "sub value"
}
array(4) {
  ["global_value"]=>
  string(12) "global value"
  ["field"]=>
  string(5) "value"
  ["sub_field"]=>
  string(9) "sub value"
  ["trilevel_field"]=>
  string(19) "third level nesting"
}
