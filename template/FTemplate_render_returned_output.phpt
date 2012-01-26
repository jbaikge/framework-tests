--TEST--
Ensure FTemplate::render() returns the rendered template as a string variable when passed true for the $return_output option.
--FILE--
<?php
$config['templates.base_template'] = dirname(__FILE__) . '/templates/base.html.php';
require(dirname(__FILE__) . '/../webroot.conf.php');
var_dump(FTemplate::render(null, true));
?>
--EXPECT--
string(71) "<html>
<head>
<title></title>
</head>
<body>
<h1></h1>
</body>
</html>
"
