--TEST--
Ensure FObjectQueryBuilder::__construct() returns the preview mode table.
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
$FOQB = new FObjectQueryBuilder('MyBuilderClass', 'on');
echo $FOQB;
?>
--EXPECT--
SELECT *
FROM
  vp_MyBuilderClass
