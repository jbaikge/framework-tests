<?php
require(dirname(__FILE__) . '/../webroot.conf.php');

if (!class_exists('FAuthorize')) {
	echo 'skip FAuthorize classes not found.';
}