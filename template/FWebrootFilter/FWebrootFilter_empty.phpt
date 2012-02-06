--TEST--
Ensure FWebrootFilter::filter() works.
--FILE--
<?php
define('WEBROOT', '');

require(dirname(__FILE__) . '/../../webroot.conf.php');

$filter = new FWebrootFilter();
echo $filter->filter('
<html>
<head>
<link href=\'/css/styles.css\' rel=\'stylesheet\'>
<link href="/css/styles.css" rel="stylesheet">
<link href=/css/styles.css rel=stylesheet>
<link href=\'css/styles.css\' rel=\'stylesheet\'>
<link href="css/styles.css" rel="stylesheet">
<link href=css/styles.css rel=stylesheet>
</head>
<body>
<a href="/index.php"></a>
<a href="index.php"></a>
<img src="/images/image.jpg">
<img src="images/image.jpg">
<form action="/action"></form>
<form action="action"></form>
</body>
</html>
');
?>
--EXPECTF--
Notice: Constant WEBROOT already defined in %s/load.php on line %d

<html>
<head>
<link href='/css/styles.css' rel='stylesheet'>
<link href="/css/styles.css" rel="stylesheet">
<link href=/css/styles.css rel=stylesheet>
<link href='css/styles.css' rel='stylesheet'>
<link href="css/styles.css" rel="stylesheet">
<link href=css/styles.css rel=stylesheet>
</head>
<body>
<a href="/index.php"></a>
<a href="index.php"></a>
<img src="/images/image.jpg">
<img src="images/image.jpg">
<form action="/action"></form>
<form action="action"></form>
</body>
</html>
