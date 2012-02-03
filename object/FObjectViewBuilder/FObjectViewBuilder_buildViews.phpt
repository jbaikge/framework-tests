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
  array(1) {
    ["builder_field"]=>
    array(%d) {
    }
  }
  ["previewTable":"FObjectViewBuilder":private]=>
  string(%d) "vp_MyBuilderClass"
  ["type":"FObjectViewBuilder":private]=>
  string(%d) "MyBuilderClass"
  ["viewTable":"FObjectViewBuilder":private]=>
  string(%d) "v_MyBuilderClass"
}