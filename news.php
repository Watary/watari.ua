<?php

	header("Content-type: text/html; charset=utf-8");
	include_once("const.inc.php");
	include_once("configuration.inc.php");
	include_once("function.php");

	if (isset($_COOKIE['id'])){
		NewDate();
	}
	if (isset($_GET['like'])){
		LikeNews($_GET['like']);
	}
	if (isset($_GET['delete'])){
		DeleteNews($_GET['delete']);
	}
	$pages = RowsPageNews();

?>
<html>

<head>

	<title><?=__TITLE_NEWS__?></title>
	<link rel="stylesheet" type="text/css" href="<?=__CSS_STYLE__?>">
	<script type="text/javascript" src="<?=__JS_SCRIPTS__?>"></script>

</head>

<body onload="startTime()">

	<div class="main_column">

		<?php include_once(__LOGO__); ?>

		<div class="separator"></div>

		<?php include(__TOP_MENU__); ?>

		<div class="separator"></div>
		<?php if (isset($_COOKIE['id'])){?>
		<div class="crate_news"><a href="<?=__L_CREATE_NEWS__?>">Додати новину</a></div>

		<div class="separator"></div>
		<?php } ?>
		<div class="page_news"><?php PageNews($pages); ?></div>

		<div class="separator"></div>

		<div class="column_news"><?php ShowNews($pages); ?></div>

		<div class="separator"></div>

		<div class="page_news"><?php PageNews($pages); ?></div>

		<div class="separator"></div>

		<?php include_once(__BOTTOM__)?>

	</div>

</body>

</html>