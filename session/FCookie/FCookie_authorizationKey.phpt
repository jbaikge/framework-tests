--TEST--
Ensure FCookie::initialize works when cookie data exists.
--SKIPIF--
<?php
if (php_sapi_name()=='cli') die ('Must be run in CGI mode');
?>
--COOKIE--
auth=auth;data={"key":"value"};digest=f40f52c58796e36270a7527df5b4c1e3e69da85a;expire=1956546000
--FILE--
<?php
$config['secret'] = 'abcdef0123456789abcdef0123456789';
require(dirname(__FILE__) . '/../../webroot.conf.php');

FCookie::initialize();
var_dump(FCookie::authorizationKey('NewAuthKey'));
?>
--EXPECT--
string(10) "NewAuthKey"
