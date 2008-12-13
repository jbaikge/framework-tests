--TEST--
Ensuring FDOMNode::appendText() works.
--FILE--
<?php
require('codeloader.php');
$dom = new FDOMDocument();
$root = $dom->rootNode('root-node', 'Initial text. ');
$root->b('Some HTML bold text. ');
$root->appendText('Appended text. ');
var_dump($dom->asXML(), $dom->asHTML());
?>
===DONE===
<?php exit(0); ?>
--EXPECT--
string(120) "<?xml version="1.0" encoding="UTF-8"?>
<root-node>Initial text. <b>Some HTML bold text. </b>Appended text. </root-node>
"
string(81) "<root-node>Initial text. <b>Some HTML bold text. </b>Appended text. </root-node>
"
===DONE===
