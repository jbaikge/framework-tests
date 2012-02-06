--TEST--
Ensure FTemplate::render() fails when the base template is not set in the config and no base template is passed.
--FILE--
<?php
$config['templates.base_template'] = '';
require(dirname(__FILE__) . '/../../webroot.conf.php');
echo FTemplate::render();
?>
--EXPECTF--
Warning: include(): Filename cannot be empty in %s
