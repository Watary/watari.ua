<?php

	header("Content-type: text/html; charset=utf-8");
	include_once("const.inc.php");
	include_once("configuration.inc.php");
	include_once("function.php");

	if (isset($_COOKIE['id'])){
		NewDate();
	}else{
		header("Location: ".__L_NEWS__);
		exit;
	}
	if (isset($_POST['bmessage'])){
		CtrateMessage();
	}

?>
<html>

<head>

	<title><?=__TITLE_CREATE_MESSAGE__?></title>
	<link rel="stylesheet" type="text/css" href="<?=__CSS_STYLE__?>">
	<script type="text/javascript" src="<?=__JS_SCRIPTS__?>"></script>

</head>

<body onload="startTime()">

	<div class="main_column">

		<?php include_once(__LOGO__); ?>

		<div class="separator"></div>

		<?php include(__TOP_MENU__); ?>

		<div class="separator"></div>

		<div class="column_left_context">

			<?php ShowCreateMessage(); ?>

		</div>

		<div class="separator"></div>

		<?php include_once(__BOTTOM__)?>

	</div>

</body>

</html>