<?php

	header("Content-type: text/html; charset=utf-8");
	include_once("const.inc.php");
	include_once("configuration.inc.php");
	include_once("function.php");

	if (isset($_COOKIE['id'])){
		NewDate();
	}else{
		header("Location: ".__L_MAIN__);
		exit;
	}
	if (isset($_POST['bnews'])){
		EditNews($_GET['edit']);
	}

	$sql = "SELECT head, text FROM news WHERE id='".$_GET['edit']."'";
	$quary = mysql_query($sql) or die(mysql_error());
	$info_news = mysql_fetch_array($quary);
	$head = $info_news['head'];
	$text = $info_news['text'];

?>
<html>

<head>

	<title><?=__TITLE_EDIT_NEWS__?></title>
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
			<form method="post" action="<?=__L_EDIT_NEWS__?>?edit=<?=$_GET['edit']?>">
			<table class="create_news_table">
				<tr>
					<td width="200">Заголовок</td><td><input type="text" name="head" class="button" size="80" value="<?=$head?>" required /></td>
				</tr>
				<tr>
					<td>Текст</td><td>
						<?php ShowEdit(); ?>
						<textarea name="text" class="button" cols="81" rows="15" id="text" required><?=$text?></textarea>
					</td>
				</tr>
				<tr>
					<td colspan="2" align="center"><input name="bnews" type="submit" value="Виправити" class="button" /></td>
				</tr>
			</table>
			</form>
		</div>

		<div class="separator"></div>

		<?php include_once(__BOTTOM__)?>

	</div>

</body>

</html>