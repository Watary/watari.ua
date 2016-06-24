<?php

	header("Content-type: text/html; charset=utf-8");
	include_once("const.inc.php");
	include_once("configuration.inc.php");
	include_once("function.php");

	if (!isset($_COOKIE['id'])){
		header("Location: ".__L_MAIN__);
		exit;
	}
	if (isset($_POST['bavatar'])){
		$rez = NewAvatar();
	}
	if (isset($_POST['bname'])){
		$rez = NewName();
	}
	if (isset($_POST['blogin'])){
		$rez = NewLogin();
	}
	if (isset($_POST['bsex'])){
		$rez = NewSex();
	}
	if (isset($_POST['bage'])){
		$rez = NewAge();
	}
	if (isset($_POST['btime_grinvith'])){
		$rez = NewTimeGrinvith();
	}
	if (isset($_POST['bemail'])){
		$rez = NewEmail();
	}
	if (isset($_POST['bpassword'])){
		$rez = NewPassword();
	}
	if (isset($_POST['bcount_news'])){
		$rez = NewCountNews();
	}
	if (isset($_POST['bcount_personal_message'])){
		$rez = NewCountPersonalMessage();
	}
	if (isset($_POST['bcount_topick_message'])){
		$rez = NewCountTopickMessage();
	}
	if (isset($_POST['bcount_gbook_message'])){
		$rez = NewCountGbookMessage();
	}

	NewDate();

?>
<html>

<head>

	<title><?=__TITLE_EDIT_PERSONAL_ACCOUNT__?></title>
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
						<?php ShowLeftMenu($array3); ?>
					</td>
					<td width="3"></td>
					<td valign="top" class="column_personal_content">
						<div class="block_personal_content">
							<?php if ($rez != ""){echo $rez;} ?>
							<?php ShowEditPersonalTable($array4); ?>
						</div>
					</td>
				</tr>
			</table>

		</div>

		<div class="separator"></div>

		<?php include_once(__BOTTOM__)?>

	</div>

</body>

</html>