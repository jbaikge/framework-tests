--TEST--
FTemplateUtils::selectOptions returns string value with one of the options selected.
--FILE--
<?php
require(dirname(__FILE__) . '/../../webroot.conf.php');
$options = array(
	1 => 'option 1',
	2 => 'option 2',
);
$selects = FTemplateUtils::selectOptions ($options, 1, true);
echo $selects . PHP_EOL;
?>
--EXPECT--
<option value="1" selected="selected">option 1</option><option value="2">option 2</option>
