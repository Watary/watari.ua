<?php

	header("Content-type: text/html; charset=utf-8");
	include_once("const.inc.php");
	include_once("configuration.inc.php");
	include_once("function.php");

	if (!isset($_COOKIE['id'])){
		header("Location: ".__L_MAIN__);
		exit;
	}

	NewDate();

	$sql = "SELECT 	name,
					login,
					date_registration,
					date_end,
					time_grinvith,
					age,
					user_group,
					email,
					avatar,
					sex,
					count_create_forum,
					count_cteate_topick,
					count_create_topick_message,
					count_create_personal_message,
					count_create_news
		FROM user WHERE id=".$_COOKIE['id'];
	$quary = mysql_query($sql);
	$info_user = mysql_fetch_array($quary);

	if($info_user['sex'] == 1){
		$sex = "Чоловіча";
	}else{
		$sex = "Жноча";
	}
	$dn = date("Y-m-d", $info_user['age']+($info_user['time_grinvith'])*3600);
	$dr = date("Y-m-d/H:i:s", $info_user['date_registration']+($info_user['time_grinvith'])*3600);
	$le = date("Y-m-d/H:i:s", $info_user['date_end']+($info_user['time_grinvith'])*3600);

	$array = array(
			"Аватар:" => "<img src='".$info_user['avatar']."' />",
			"Ім'я:" => $info_user['name'],
			"Логін:" => $info_user['login'],
			"Стать:" => $sex,
			"День народження:" => $dn,
			"День реєстрації:" => $dr,
			"Часовий пояс:" => $info_user['time_grinvith']+3,
			"Останього разу був на сайті:" => $le,
			"Група:" => $info_user['user_group'],
			"Електонна пошта:" => $info_user['email'],
			"Створено форумів:" => $info_user['count_create_forum'],
			"Створено тем:" => $info_user['count_cteate_topick'],
			"Створено повідомлень на форумі:" => $info_user['count_create_topick_message'],
			"Створено новин:" => $info_user['count_create_news'],
			"Надіслано повідомлень:" => $info_user['count_create_personal_message']
			);

?>
<html>

<head>

	<title><?=__TITLE_PERSONAL_ACCOUNT__?></title>
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
							<?php ShowPersunalTable($array); ?>
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