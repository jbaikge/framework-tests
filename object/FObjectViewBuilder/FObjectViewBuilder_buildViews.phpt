--TEST--
Ensure FObjectViewBuilder::buildViews executes queries to build the view "tables".
--SKIPIF--
<?php
require(dirname(__FILE__) . '/../../database/skipif.php');
?>
--FILE--
<?php
define('DATABASE', 'single');
require(dirname(__FILE__) . '/../../webroot.conf.php');

FObjectQuery::updateStructure();
MyBuilderClass::setup();
$FOVB = new FObjectViewBuilder(new MyBuilderClass());
$FOVB->buildViews();
var_dump($FOVB);
?>
--EXPECTF--
object(FObjectViewBuilder)#%d (%d) {
  ["fields":"FObjectViewBuilder":private]=>
  array(2) {
    ["builder_field"]=>
    array(0) {
    }
    ["cast_field"]=>
    array(1) {
      ["cast"]=>
      string(8) "CHAR(32)"
    }
  }
  ["previewTable":"FObjectViewBuilder":private]=>
  string(17) "vp_MyBuilderClass"
  ["type":"FObjectViewBuilder":private]=>
  string(14) "MyBuilderClass"
  ["viewTable":"FObjectViewBuilder":private]=>
  string(16) "v_MyBuilderClass"
}
