--TEST--
Ensure FFormField sets the filter attribute when one is defined in the class.
--FILE--
<?php
require(dirname(__FILE__) . '/../../webroot.conf.php');
/*!
 * Unable to pass filter attribute directly to FFormField. So we use a dummy 
 * class that extends the FFormField class and has a filter attribute set.
 */
class dummyField extends FFormField {
	protected $filter = FILTER_UNSAFE_RAW;
}

$field = new dummyField('test');
var_dump($field->get('filter'));
?>
--EXPECT--
int(516)
