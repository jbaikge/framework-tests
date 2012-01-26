--TEST--
Ensure FCookie::initialize works when cookie data exists.
--SKIPIF--
<?php
if (php_sapi_name()=='cli') die ('Must be run in CGI mode');
?>
--COOKIE--
auth=auth;data={"key":"value"};digest=broken_digest;expire=1956546000
--FILE--
<?php
$config['secret'] = 'abcdef0123456789abcdef0123456789';
require(dirname(__FILE__) . '/../webroot.conf.php');

FCookie::initialize();
$auth = FCookie::authorizationKey();
var_dump($auth);
?>
--EXPECTF--
Fatal error: Uncaught exception 'CookieException' with message 'Invalid Digest'%s
