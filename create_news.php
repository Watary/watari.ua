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
	if (isset($_POST['bnews'])){
		CreateNews();
	}

?>
<html>

<head>

	<title><?=__TITLE_CREATE_NEWS__?></title>
	<link rel="stylesheet" type="text/css" href="<?=__CSS_STYLE__?>">
	<script type="text/javascript" src="<?=__JS_SCRIPTS__?>"></script>

</head>

<body onload="startTime()">

	<div class="main_column">

		<?php include_once(__LOGO__); ?>

		<div class="separator"></div>

		<?php include(__TOP_MENU__); ?>

		<div class="separator"></div>

		<div class="column_create_news">
			<form method="post" action="<?=__L_CREATE_NEWS__?>" name="create_news">
			<table class="create_news_table">
				<tr>
					<td width="200">Заголовок</td><td><input type="text" name="head" class="button" size="80" required /></td>
				</tr>
				<tr>
					<td>Текст</td><td>
						<?php ShowEdit(); ?>
						<textarea name="text" class="button" cols="81" rows="15" id="text" required></textarea>
					</td>
				</tr>
				<tr>
					<td colspan="2" align="center"><input name="bnews" type="submit" value="Створити" class="button" /></td>
				</tr>
			</table>
			</form>
		</div>

		<div class="separator"></div>

		<?php include_once(__BOTTOM__)?>

	</div>

</body>

</html>