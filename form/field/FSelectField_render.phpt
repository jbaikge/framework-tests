--TEST--
Ensure FSelectField renders properly.
--FILE--
<?php
require_once(dirname(__FILE__) . '/../../webroot.conf.php');

$field = new FSelectField('password');
$field->options(array(1=>'value 1', 2=>'value 2'));
var_dump(FTemplate::fetch($field->getTemplate()));
?>
--EXPECT--
string(177) "<label for="password">Password</label>
<select name="password" id="password" class="FSelectField">
	<option value="1">value 1</option><option value="2">value 2</option></select>"
