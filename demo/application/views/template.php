<?php defined('SYSPATH') OR die('No direct access allowed.'); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>

	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	<title><?php echo html::specialchars($title) ?></title>

	<style type="text/css">
	html { background: #83c018; }
	body { text-align: center; padding: 50px; margin: 50px; font-size: 76%; font-family: Arial, sans-serif; color: #273907; line-height: 1.5;}
	h1 { font-size: 3em; font-weight: normal; text-transform: uppercase; color: #fff; }
	a { color: inherit; }
	code { font-size: 1.3em; }
	ul { list-style: none; padding: 2em 0; }
	ul li { display: inline; padding-right: 1em; text-transform: uppercase; }
	ul li a { padding: 0.5em 1em; background: #69ad0f; border: 1px solid #569f09; color: #fff; text-decoration: none; }
	ul li a:hover { background: #569f09; }
	.box { padding: 2em; background: #98cc2b; border: 1px solid #569f09; }
	.copyright { font-size: 0.9em; text-transform: uppercase; color: #557d10; }
	</style>
    
    <?php echo $checkall_js; ?>
    
</head>
<body>

	<h1><?php echo html::specialchars($title) ?></h1>

	<form name="form1">
	
	<?php echo $content ?>
    </form>
    
	<p class="copyright">
		Rendered in {execution_time} seconds, using {memory_usage} of memory<br />
	</p>

</body>
</html>