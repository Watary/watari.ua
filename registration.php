<?php

	header("Content-type: text/html; charset=utf-8");
	include_once("const.inc.php");
	include_once("configuration.inc.php");
	include_once("function.php");

	if (isset($_COOKIE['id'])){
		header("Location: ".__L_MAIN__);
		exit;
	}
	if (isset($_POST['registration'])){
		$rezult_reg = Registration();
		if (isset($_COOKIE['id'])){
			header("Location: ".__L_MAIN__);
			exit;
		}
	}

?>
<html>

<head>

	<title><?=__TITLE_REGISTRATION__?></title>
	<link rel="stylesheet" type="text/css" href="<?=__CSS_STYLE__?>">
	<script type="text/javascript" src="<?=__JS_SCRIPTS__?>"></script>

</head>

<body onload="startTime()">

	<div class="main_column">

		<?php include_once(__LOGO__); ?>

		<div class="separator"></div>

		<?php include(__TOP_MENU__); ?>

		<div class="separator"></div>

		<div class="column_registration_context">

			<center><img src="image/t_regeneration.png" vspace="30" /><center>

			<div class="registration_table"><?=$rezult_reg?></div>

			<form method="post" action="<?=__L_REGISTRATION__?>">
				<table align="center" border="0" cellspacing="10" class="registration_table">
					<tr>
						<td width="300">Ім'я:</td><td><input type="text" name="name" value="<?=$_POST['name']?>" size='30' class="button" required /></td>
					</tr>
					<tr>
						<td width="300">Логін:</td><td><input type="text" name="login" value="<?=$_POST['login']?>" size="30" class="button" required /></td>
					</tr>
					<tr>
						<td width="300">Пароль:</td><td><input type="password" name="password" size='30' class='button' required /></td>
					</tr>
					<tr>
						<td width="300">Повторіть пароль:</td><td><input type="password" name="repeat_password" size='30' class='button' required /></td>
					</tr>
					<tr>
						<td width="300">Електронна пошта:</td><td><input type="text" name="e_mail" value="<?=$_POST['e_mail']?>" size='30' class='button' required /></td>
					</tr>
					<tr>
						<td width="300">Стать:</td><td>Чоловіча<input type="radio" name="sex" value="1" size='30' class='button' checked />Жіноча<input type="radio" name="sex" value="0" size='30' class='button' /></td>
					</tr>
					<tr>
						<td colspan="2" align="center"><input type="submit" name="registration" class="button_registration" value="Зареєструватися" /></td>
					</tr>
				</table>
			</form>

		</div>

		<div class="separator"></div>

		<?php include_once(__BOTTOM__)?>

	</div>

</body>

</html>