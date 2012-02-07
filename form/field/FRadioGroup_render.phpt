--TEST--
Ensure FRadioGroup renders properly.
--FILE--
<?php
require_once(dirname(__FILE__) . '/../../webroot.conf.php');

$field = new FRadioGroup('Radio Group');
$field->options(array(1=>'value 1', 2=>'value 2'));
var_dump(FTemplate::fetch($field->getTemplate()));
?>
--EXPECT--
string(295) "<label for="Radio Group">Radio Group</label>
<label for="Radio Group-1" class="radio"><input type="radio" id="Radio Group-1" name="Radio Group" value="1"> value 1</label><label for="Radio Group-2" class="radio"><input type="radio" id="Radio Group-2" name="Radio Group" value="2"> value 2</label>"
