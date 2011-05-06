--TEST--
Ensuring basic functionality of FDOMDocument
--FILE--
<?php
require(dirname(__FILE__) . '/../webroot.conf.php');
$dom = new FDOMDocument;
var_dump($dom->asXML(), $dom->asHTML());
$dom = new FDOMDocument(1.1);
var_dump($dom->asXML(), $dom->asHTML());
$dom = new FDOMDocument('1.0', 'ISO-8859-1');
var_dump($dom->asXML(), $dom->asHTML());
?>
===DONE===
<?php exit(0); ?>
--EXPECT--
string(39) "<?xml version="1.0" encoding="UTF-8"?>
"
string(1) "
"
string(39) "<?xml version="1.1" encoding="UTF-8"?>
"
string(1) "
"
string(44) "<?xml version="1.0" encoding="ISO-8859-1"?>
"
string(1) "
"
===DONE===
