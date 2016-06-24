<?php

	header("Content-type: text/html; charset=utf-8");
	include_once("const.inc.php");
	include_once("configuration.inc.php");
	include_once("function.php");

	if (isset($_COOKIE['id'])){
		NewDate();
	}
	if (isset($_GET['exit'])){
		DeleteCookie();
	}

?>
<html>

<head>

	<title><?=__TITLE_INDEX__?></title>
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

			<table border="0" cellspacing="0" cellpadding="1">
				<tr>
					<td valign="top" class="column_left">
						<?php
							if (isset($_COOKIE['id'])){
								ShowLeftMenu($array1);
							}else{
								ShowLeftMenu($array2);
							}
						?>
					</td>
					<td width="3"></td>
					<td valign="top" class="column_context">
						<?php ShowMainNews(); ?>
					</td>
				</tr>
			</table>

		</div>

		<div class="separator"></div>	

		<?php include_once(__BOTTOM__)?>

	</div>

</body>

</html>