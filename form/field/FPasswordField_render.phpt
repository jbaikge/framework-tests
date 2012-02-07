--TEST--
Ensure FPasswordField renders properly.
--FILE--
<?php
require_once(dirname(__FILE__) . '/../../webroot.conf.php');

$field = new FPasswordField('password');
var_dump(FTemplate::fetch($field->getTemplate()));
?>
--EXPECT--
string(125) "<label for="password">Password</label>
<input type="password" value="" name="password" id="password" class="FPasswordField">
"
