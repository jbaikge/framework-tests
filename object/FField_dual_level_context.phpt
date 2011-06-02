--TEST--
Build contexts that inherit (2-levels)
--FILE--
<?php
require(dirname(__FILE__) . '/../webroot.conf.php');

$field = FField::make('test')
	->global_value('global value')
	->context_options()
		->field('value')
	->context_sub_options()
		->sub_field('sub value')
;
var_dump(
	$field->getData(),
	$field->getData('context'),
	$field->getData('context_sub')
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
