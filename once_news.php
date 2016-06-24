<?php

	header("Content-type: text/html; charset=utf-8");
	include_once("const.inc.php");
	include_once("configuration.inc.php");
	include_once("function.php");

	if (isset($_COOKIE['id'])){
		NewDate();
		$sql = "SELECT time_grinvith FROM user WHERE id=".$_COOKIE['id'];
		$quary = mysql_query($sql);
		$info_user = mysql_fetch_array($quary);
		$info['time_grinvith'] = $info_user['time_grinvith'];
	}
	if (isset($_GET['like'])){
		LikeNews($_GET['like'], 1);
	}
	if (isset($_GET['delete'])){
		DeleteNews($_GET['delete'], 1);
	}
	$id = $_GET['news'];
	$sql = "SELECT head, text, date, likes FROM news WHERE id=$id";
	$quary = mysql_query($sql);
	$info_news = mysql_fetch_array($quary);
	$info['date'] = date("Y-m-d/H:i:s", $info_news['date']+($info_user['time_grinvith'])*3600);
	$info['head'] = $info_news['head'];
	$info['id'] = $id;
	$info['likes'] = $info_news['likes'];
	$info['text'] = nl2br(my_code($info_news['text']));

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

		<div class="column_news">
			<?php ShowNew($info); ?>
		</div>

		<div class="separator"></div>

		<?php include_once(__BOTTOM__)?>

	</div>

</body>

</html>