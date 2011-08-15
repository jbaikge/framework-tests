<?php
require(dirname(__FILE__) . '/../webroot.conf.php');

if (!class_exists('FCalendarDay')) {
	echo 'skip no calendar module.';
}