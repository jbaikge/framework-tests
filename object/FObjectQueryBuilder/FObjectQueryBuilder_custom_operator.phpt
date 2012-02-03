--TEST--
Ensure FObjectQueryBuilder properly attaches atypical where clause "glue" statements when supplied.
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
$FOQB = new FObjectQueryBuilder('MyBuilderClass');
echo $FOQB->builder_field__in('testing');
?>
--EXPECT--
SELECT *
FROM
  v_MyBuilderClass
WHERE
  builder_field IN ('testing')
