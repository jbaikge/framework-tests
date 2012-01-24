<?php
require(dirname(__FILE__) . '/../../webroot.conf.php');

if (!class_exists('FDateField') && !class_exists('FUploadField')) {
	die('skip FDateField and FUploadField classes not found.');
}