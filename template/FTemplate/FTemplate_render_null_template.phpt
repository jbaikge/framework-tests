--TEST--
Ensure FTemplate::render() works when not passed a base template as a parameter.
--FILE--
<?php
$_ENV['config']['templates.base_template'] = dirname(__FILE__) . 'templates/base.html.php';
require(dirname(__FILE__) . '/../../webroot.conf.php');
echo FTemplate::render();
?>
--EXPECT--
<html>
<head>
<title></title>
</head>
<body>
<h1></h1>
</body>
</html>
