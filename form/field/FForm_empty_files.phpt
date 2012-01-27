--TEST--
Ensure FForm filters out empty file uploads.
--DESCRIPTION--
You must have php5-cgi installed for this test to work. It will skip otherwise.
--SKIPIF--
<?php
require(dirname(__FILE__) . '/skipif.php');
if (php_sapi_name()=='cli') die ('Must be run in CGI mode');
?>
--POST_RAW--
Content-type: multipart/form-data, boundary=FormBoundary

--FormBoundary
Content-Disposition: form-data; name="test"; filename=""

--FormBoundary--
--FILE--
<?php
define('DATABASE', 'single');
require_once(dirname(__FILE__) . '/../../webroot.conf.php');
include ('upload.php');

class dummy extends FObject implements FFormProcessable {
	public static function getModel() {
		return new FModelManager(array(
			FField::make('test')
				->form_options()
					->type('FUploadField')
					->optional(true)
		));
	}
}
$form = FFormFactory::fromClass('dummy');
var_dump($form->loadAndValidate());
?>
--EXPECT--
bool(false)
