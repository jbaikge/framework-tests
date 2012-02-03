--TEST--
Ensure FObjectQueryBuilder::__call attaches fields to where clauses.
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
echo $FOQB->builder_field('testing');
?>
--EXPECT--
SELECT *
FROM
  vp_MyBuilderClass
WHERE
  builder_field = 'testing'
