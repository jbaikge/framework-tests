--TEST--
Ensure FCalendarMonth::setTemplateFor() sets the proper template.
--SKIPIF--
<?php
require(dirname(__FILE__) . '/../skipif.php');
?>
--FILE--
<?php
require_once(dirname(__FILE__) . '/../../webroot.conf.php');
$template = '/tmp/mytemplate.html.php';
$month = new FCalendarMonth(date('M'), date('Y'));
var_dump($month
	->setTemplateFor('day', $template)
	->getTemplateFor('day') == $template
);
?>
--EXPECT--
bool(true)
