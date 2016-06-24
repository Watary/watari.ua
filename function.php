<?php

	include_once("array.php");
	include_once(__MY_CODE__);

	function ShowLeftMenu($menu){
		echo "<div class='column_left_block'><lu>";
		foreach($menu as $link => $href){
			echo "<li><a href='$href'>$link</a></li>";
		}
		echo "<lu></div>";
	}
	function EnterCheckBox($var1, $var2){
        $rez = '';
		for ($i = $var1; $i <= $var2; $i++){
			$rez = $rez."<option value=$i> $i </option><br />";
		}
		return $rez;
	}
	function Registration(){

		$sql = "SELECT login FROM user WHERE login='".$_POST['login']."'";
		$quary = mysql_query($sql);
		$rows = mysql_num_rows($quary);
		if ($rows > 0){
			return "Користувч з таким логіном уже існує!";
		}
		if ($_POST['password'] != $_POST['repeat_password']){
			return "Паролі не збігаються!";
		}
		if (!preg_match("/[-a-zA-Zа-яА-Я0-9]{3,15}/", $_POST['name'])){
			$rez = "Ім'я не відповідає вимогам офрмлення!";
		}
		if (!preg_match("/[-a-zA-Zа-яА-Я0-9]{3,15}/", $_POST['login'])){
			$rez = "Логін не відповідає вимогам офрмлення!";
		}
		if (!preg_match("/[-a-zA-Zа-яА-Я0-9]{3,30}/", $_POST['password'])){
			$rez = "Пароль не відповідає вимогам офрмлення!";
		}
		if (!preg_match("/[-a-zA-Zа-яА-Я0-9]{3,30}/", $_POST['e_mail']) or !strstr($_POST['e_mail'], '@')){
			$rez = "Електронна пошта не відповідає вимогам офрмлення!";
		}
		if ($rez){
			return $rez;
		}

		$name = trim(strip_tags($_POST['name']));
		$login = trim(strip_tags($_POST['login']));
		$e_mail = trim(strip_tags($_POST['e_mail']));
		$password = md5(trim($_POST['password']));
		$sex = (int)$_POST['sex'];
		$date = mktime();

		$sql = "INSERT INTO personage () VALUES ()";
		mysql_query($sql) or die(mysql_error());

		$sql = "SELECT id FROM user";
		$quary = mysql_query($sql);
		$p_id = mysql_num_rows($quary) + 1;

		$sql = "INSERT INTO user (login, name, password, email, personage, date_registration, date_end, sex) VALUES ('$login', '$name', '$password', '$e_mail', $p_id, $date, $date, $sex)";
		mysql_query($sql) or die(mysql_error());

		setcookie("id", $p_id, time()+60*60*24*7);

		header("Location: ".__L_MAIN__);
	}
	function Entrance(){

		if (!preg_match("/[-a-zA-Zа-яА-Я0-9]{3,15}/", $_POST['login'])){
			$rez = "Логін не відповідає вимогам офрмлення!";
		}
		if (!preg_match("/[-a-zA-Zа-яА-Я0-9]{3,30}/", $_POST['password'])){
			$rez = "Пароль не відповідає вимогам офрмлення!";
		}
		if ($rez){
			return $rez;
		}

		$login = trim(strip_tags($_POST['login']));
		$password = md5(trim($_POST['password']));

		$sql = "SELECT id FROM user WHERE login='$login' and password='$password'";
		$quary = mysql_query($sql) or die(mysql_error());
		$rows = mysql_num_rows($quary);
		if ($rows == 0){
			return "Жоджного користувача з такими логіном і паролем не знайдено!";
		}

		$info_rows = mysql_fetch_array($quary);
		if ($_POST['lost'] == false){
			setcookie("id", $info_rows['id'], time()+60*60*24*7);
		}else{
			setcookie("id", $info_rows['id']);
		}
		$date = mktime();
		$id = $info_rows['id'];

		$sql = "UPDATE user SET date_end=$date WHERE id='$id'";
		mysql_query($sql) or die(mysql_error());
		
		header("Location: ".__L_MAIN__);
		exit;

	}
	function NewDate(){
		$id =$_COOKIE['id'];
		$date = mktime();
		$sql = "UPDATE user SET date_end=$date WHERE id='$id'";
		mysql_query($sql) or die(mysql_error());
	}
	function DeleteCookie(){
		setcookie("id", "", time()-3600);
		header("Location: ".__L_MAIN__);
	}
	function ShowPersunalTable($array){
		echo "<table border='0' cellspacing='0' cellpadding='5' class='table_personal_content'>";
			foreach($array as $name => $link){?>			
				<tr>
					<td width="400"><?=$name?></td><td width="470"><?=$link?></td>
				</tr>
			<?php }
		echo "</table>";
	}
	function UserOnOff(){
		$time = mktime();
		$sql = "SELECT date_end,login FROM user WHERE (($time-date_end)<600)";
		$quary = mysql_query($sql) or die(mysql_error());
		$rows = mysql_num_rows($quary);
		$i = 0;
		if ($rows == 0){
			echo "<div class='UserOnOff'>Зараз на сайті немає жодного авторизованого користувача</div>";
			return NULL;
		}
		echo "<div class='UserOnOff'>Зараз на сайті $rows користувач, а саме: ";
		while ($info_date = mysql_fetch_array($quary)){
			$i++;
			if ($i == $rows){
				echo $info_date['login'].".";
			}else{
				echo $info_date['login'].', ';
			}
		}
		echo "</div>";
	}
	function ShowEditPersonalTable($array){
		echo "<table border='0' cellspacing='0' cellpadding='5' class='table_personal_edit'><td width='280'>Аватар<form method='post' enctype='multipart/form-data' action='".__L_EDIT_ACCOUNT__."'></td><td width='420'><input type='file' name='avatar' size='22' class='button' /></td><td><input type='submit' name='bavatar' class='button' value='Виправити' /></form></td><form method='post' action=".__L_EDIT_ACCOUNT__.">";
			foreach($array as $name => $link){?>			
				<tr>
					<td><?=$name?></td><td><?=$link?></td>
				</tr>
			<?php }
		echo "</form></table>";
	}
	function NewAvatar(){
		if ($_FILES['avatar']['error'] == 0){
			$tn = $_FILES['avatar']['tmp_name'];
			$type = $_FILES['avatar']['type'];
			$id = $_COOKIE['id'];
			switch ($type){
				case "image/jpeg": $avatar = "avatar/avatar_$id.jpg"; break;
				case "image/png": $avatar = "avatar/avatar_$id.png"; break;
				case "image/gif": $avatar = "avatar/avatar_$id.gif"; break;
				case "image/bmp": $avatar = "avatar/avatar_$id.bmp"; break;
			}
			move_uploaded_file($tn, $avatar);
			$sql = "UPDATE user SET avatar='$avatar' WHERE id='$id'";
			mysql_query($sql) or die(mysql_error());
			return "Аватар успішно змінено!";
		}else{
			return "Аватар не змінено!";
		}
	}
	function NewName(){
		if (!preg_match("/[-a-zA-Zа-яА-Я0-9]{3,15}/", $_POST['name'])){
			return "Ім'я не відповідає вимогам офрмлення!";
		}
		$id = $_COOKIE['id'];
		$name = trim(strip_tags($_POST['name']));
		$sql = "UPDATE user SET name='$name' WHERE id='$id'";
		mysql_query($sql) or die(mysql_error());
		return "Ім'я успішно змінено!";
	}
	function NewLogin(){
		$sql = "SELECT login FROM user WHERE login='".$_POST['login']."'";
		$quary = mysql_query($sql);
		$rows = mysql_num_rows($quary);
		if ($rows > 0){
			return "Користувч з таким логіном уже існує!";
		}
		if (!preg_match("/[-a-zA-Zа-яА-Я0-9]{3,15}/", $_POST['login'])){
			return "Логін не відповідає вимогам офрмлення!";
		}
		$login = trim(strip_tags($_POST['login']));
		$id = $_COOKIE['id'];
		$sql = "UPDATE user SET login='$login' WHERE id='$id'";
		mysql_query($sql) or die(mysql_error());
		return "Логін успішно змінено!";
	}
	function NewSex(){
		$sex = (int)$_POST['sex'];
		$id = $_COOKIE['id'];
		$sql = "UPDATE user SET sex=$sex WHERE id='$id'";
		mysql_query($sql) or die(mysql_error());
		return "Стать успішно змінено!";
	}
	function NewAge(){
		$age = mktime(0, 0, 0, $_POST['agemonth'], $_POST['ageday']+1, $_POST['ageyear']);
		$id = $_COOKIE['id'];
		$sql = "UPDATE user SET age=$age WHERE id='$id'";
		mysql_query($sql) or die(mysql_error());
		return "День народження успішно змінено!";
	}
	function NewTimeGrinvith(){
		$time = (int)$_POST['time_grinvith'];
		if ($time < -12 or $time > 12){
			$time = 0;
		}
		$time -= 3;
		$id = $_COOKIE['id'];
		$sql = "UPDATE user SET time_grinvith=$time WHERE id='$id'";
		mysql_query($sql) or die(mysql_error());
		return "Часовий пояс успішно змінено!";
	}
	function NewEmail(){
		if (!preg_match("/[-a-zA-Zа-яА-Я0-9]{3,30}/", $_POST['email']) or !strstr($_POST['email'], '@')){
			return "Електронна пошта не відповідає вимогам офрмлення!";
		}
		$email = trim(strip_tags($_POST['email']));
		$id = $_COOKIE['id'];
		$sql = "UPDATE user SET email='$email' WHERE id='$id'";
		mysql_query($sql) or die(mysql_error());
		return "Адреса електронної пошти успішно змінено!";
	}
	function NewPassword(){
		if ($_POST['password'] != $_POST['repeat_password']){
			return "Паролі не збігаються!";
		}
		if (!preg_match("/[-a-zA-Zа-яА-Я0-9]{3,30}/", $_POST['password'])){
			return "Пароль не відповідає вимогам офрмлення!";
		}
		$password = md5(trim($_POST['password']));
		$id = $_COOKIE['id'];
		$sql = "SELECT password FROM user WHERE id='$id'";
		$quary = mysql_query($sql) or die(mysql_error());
		$info_rows = mysql_fetch_array($quary);
		$lostpassword = md5(trim($_POST['lostpassword']));
		if ($info_rows['password'] != $lostpassword){
			return "Пароль не вірний!";
		}
		$sql = "UPDATE user SET password='$password' WHERE id='$id'";
		mysql_query($sql) or die(mysql_error());
	}
	function NewCountNews(){
		if (!preg_match("/[0-9]{1,9}/", $_POST['count_news'])){
			return "Число не відповідає вимогам офрмлення!";
		}
		$count_news = abs((integer)$_POST['count_news']);
		if ($count_news == 0){
			$count_news = 1;
		}
		if ($count_news > 999999999){
			$count_news = 999999999;
		}
		$id = $_COOKIE['id'];
		$sql = "UPDATE user SET count_news=$count_news WHERE id='$id'";
		mysql_query($sql) or die(mysql_error());
		return "Кількість відображення новин успішно змінено!";
	}
	function NewCountPersonalMessage(){
		if (!preg_match("/[0-9]{1,9}/", $_POST['count_personal_message'])){
			return "Число не відповідає вимогам офрмлення!";
		}
		$count_personal_message = abs((integer)$_POST['count_personal_message']);
		if ($count_personal_message == 0){
			$count_personal_message = 1;
		}
		if ($count_personal_message > 999999999){
			$count_personal_message = 999999999;
		}
		$id = $_COOKIE['id'];
		$sql = "UPDATE user SET count_personal_message=$count_personal_message WHERE id='$id'";
		mysql_query($sql) or die(mysql_error());
		return "Кількість відображення персонільних повідомлень успішно змінено!";
	}
	function NewCountTopickMessage(){
		if (!preg_match("/[0-9]{1,9}/", $_POST['count_topick_message'])){
			return "Число не відповідає вимогам офрмлення!";
		}
		$count_topick_message = abs((integer)$_POST['count_topick_message']);
		if ($count_topick_message == 0){
			$count_topick_message = 1;
		}
		if ($count_topick_message > 999999999){
			$count_topick_message = 999999999;
		}
		$id = $_COOKIE['id'];
		$sql = "UPDATE user SET count_topick_message=$count_topick_message WHERE id='$id'";
		mysql_query($sql) or die(mysql_error());
		return "Кількість відображення повідомлень в темах успішно змінено!";
	}
	function NewCountGbookMessage(){
		if (!preg_match("/[0-9]{1,9}/", $_POST['count_gbook_message'])){
			return "Число не відповідає вимогам офрмлення!";
		}
		$count_gbook_message = abs((integer)$_POST['count_gbook_message']);
		if ($count_gbook_message == 0){
			$count_gbook_message = 1;
		}
		if ($count_gbook_message > 999999999){
			$count_gbook_message = 999999999;
		}
		$id = $_COOKIE['id'];
		$sql = "UPDATE user SET count_gbook_message=$count_gbook_message WHERE id='$id'";
		mysql_query($sql) or die(mysql_error());
		return "Кількість відображення повідомлень в гостьовій книзі успішно змінено!";
	}
	function CreateNews(){
		$head = trim(strip_tags($_POST['head']));
		$text = trim(strip_tags($_POST['text']));
		$date = mktime();
		$id = $_COOKIE['id'];

		$sql = "INSERT INTO news (head, text, date, id_autor) VALUES ('$head', '$text', $date, $id)";
		mysql_query($sql) or die(mysql_error());
		header("Location: ".__L_NEWS__);
	}
	function ShowNews($pages){
		if (isset($_COOKIE['id'])){
			$sql = "SELECT time_grinvith FROM user WHERE id=".$_COOKIE['id'];
			$quary = mysql_query($sql);
			$info_user = mysql_fetch_array($quary);
		}
		$sql = "SELECT id, head, text, date, likes FROM news";
		$quary = mysql_query($sql);
		for ($i = $pages['page'] * $pages['count_news']; $i < $pages['nextPage'] * $pages['count_news']; $i++){
			if ($i > $pages['count'] - 1){
				break;
			}
			$date = date("Y-m-d/H:i:s", mysql_result($quary, $i, 'date')+($info_user['time_grinvith'])*3600);
			$head = mysql_result($quary, $i, 'head');
			$id = mysql_result($quary, $i, 'id');
			$likes = mysql_result($quary, $i, 'likes');
			$text = nl2br(my_code(mysql_result($quary, $i, 'text')));
			echo "<div class='block_news'>";
				echo "<div align='right'><font size='2'>$date</font></div>";;
				echo "<div align='center'><a href='".__L_ONCE_NEWS__."?news=$id'><font size='7'>$head</font></a></div>";
				echo "<div align='left'><font size='5'>$text</font></div>";
				if (isset($_COOKIE['id'])){
					echo "<hr />";
					echo "<a href='".__L_NEWS__."?like=$id'><font size='2'>Подобається($likes)</font></a>";
					echo "<font size='3'> * </font>";
					echo "<a href='".__L_EDIT_NEWS__."?edit=$id'><font size='2'>Редагувати</font></a>";
					echo "<font size='3'> * </font>";
					echo "<a href='".__L_NEWS__."?delete=$id'><font size='2'>Видалити</font></a>";
				}
			echo "</div><div class='separator_news'></div>";
		}
	}
	function ShowMainNews(){
		if (isset($_COOKIE['id'])){
			$sql = "SELECT time_grinvith FROM user WHERE id=".$_COOKIE['id'];
			$quary = mysql_query($sql);
			$info_user = mysql_fetch_array($quary);
		}
		$sql = "SELECT id, head, text, date, likes FROM news";
		$quary = mysql_query($sql);
		$rows_news = mysql_num_rows($quary);
		if ($rows_news < 5){
			$rows_news_min = 0;
		}else{
			$rows_news_min = $rows_news - 5;
		}
		for ($i = $rows_news-1; $rows_news_min <= $i; $i--){
			$date = date("Y-m-d/H:i:s", mysql_result($quary, $i, 'date')+($info_user['time_grinvith'])*3600);
			$head = mysql_result($quary, $i, 'head');
			$id = mysql_result($quary, $i, 'id');
			$text = nl2br(my_code(mysql_result($quary, $i, 'text')));
			echo "<div class='block_news'>";
				echo "<div align='right'><font size='2'>$date</font></div>";
				echo "<div align='center'><a href='".__L_ONCE_NEWS__."?news=$id'><font size='7'>$head</font></a></div>";
				echo "<div align='left'><font size='5'>$text</font></div>";
			echo "</div><div class='separator_news'></div>";
		}
	}
	function LikeNews($id, $L = 0){
		$sql = "SELECT likes FROM news WHERE id='$id'";
		$quary = mysql_query($sql);
		$likes = mysql_fetch_array($quary);
		$likes = $likes['likes'] + 1;
		$sql = "UPDATE news SET likes=$likes WHERE id='$id'";
		mysql_query($sql) or die(mysql_error());
		if ($L == 0){
			header("Location: ".__L_NEWS__);
		}
		if ($L == 1){
			header("Location: ".__L_ONCE_NEWS__."?news=$id");
		}
	}
	function DeleteNews($id, $L = 0){
		$sql = "SELECT id_autor, date, head, text, likes FROM news WHERE id='$id'";
		$quary = mysql_query($sql);
		$info_news = mysql_fetch_array($quary);
		$id_autor = $info_news['id_autor'];
		$date = $info_news['date'];
		$head = $info_news['head'];
		$text = $info_news['text'];
		$likes = $info_news['likes'];
		$lost_id = $id;
		$sql = "INSERT INTO news_delete (id_autor, date, head, text, likes, lost_id) VALUES ($id_autor, $date, '$head', '$text', $likes, '$lost_id')";
		mysql_query($sql) or die(mysql_error());
		$query = "DELETE FROM news WHERE id = $id";
		mysql_query($query) or die(mysql_error());
		if ($L == 0){
			header("Location: ".__L_NEWS__);
		}
		if ($L == 1){
			header("Location: ".__L_ONCE_NEWS__."?news=$id");
		}
	}
	function ShowEdit(){
		echo "<div>";
			echo "<input type='button' onclick='setBold()' class='button' value='B'>";
			echo "<input type='button' onclick='setItalic()' class='button' value='I'>";
			echo "<input type='button' onclick='setUnderline()' class='button' value='U'>";
		echo "</div>";
	}
	function EditNews($id){
		$head = trim(strip_tags($_POST['head']));
		$text = trim(strip_tags($_POST['text']));
		$sql = "UPDATE news SET head='$head', text='$text' WHERE id='$id'";
		mysql_query($sql) or die(mysql_error());
		header("Location: ".__L_NEWS__);
	}
	function PageNews($pages){
		echo "<center>";
		if($pages['ferstPage'] >= 0){
			echo "<a href='news.php?page=0'><<<</a> | <a href='news.php?page=".$pages['ferstPage']."'><</a> | ";
		}
		echo "<a href='news.php?page=".$pages['page']."'>".($pages['page']+1)."</a>";
		if($pages['nextPage'] <= $pages['p']){
			echo " | <a href='news.php?page=".$pages['nextPage']."'>></a> | <a href='news.php?page=".$pages['p']."'>>>></a>"; 
		}
		echo "</center>";
	}
	function RowsPageNews(){
		if (isset($_COOKIE['id'])){
			$sql = "SELECT count_news FROM user WHERE id=".$_COOKIE['id'];
			$quary = mysql_query($sql);
			$info_user = mysql_fetch_array($quary);
		}else{
			$info_user['count_news'] = 10;
		}
		$sql = "SELECT id FROM news";
		$quare = mysql_query($sql);
		$count = mysql_num_rows($quare);
		$p =(integer)(($count - 1) / $info_user['count_news']);
		if (isset($_GET['page'])){
			$page = $_GET['page'];
		}else{
			$page = 0;
		}
		if ($p < $page){
			$page = $p;
		}
		if (0 > $page){
			$page = 0;
		}
		$ferstPage = $page - 1;
		$nextPage = $page + 1;
		$pages['page'] = $page;
		$pages['ferstPage'] = $ferstPage;
		$pages['nextPage'] = $nextPage;
		$pages['p'] = $p;
		$pages['count'] = $count;
		$pages['count_news'] = $info_user['count_news'];
		return $pages;
	}
	function ShowNew($info){
		$date = $info['date'];
		$head = $info['head'];
		$id = $info['id'];
		$likes = $info['likes'];
		$text = $info['text'];
		echo "<div class='block_news'>";
			echo "<div align='right'><font size='2'>$date</font></div>";;
			echo "<div align='center'><font size='7'>$head</font></div>";
			echo "<div align='left'><font size='5'>$text</font></div>";
			if (isset($_COOKIE['id'])){
				echo "<hr />";
				echo "<a href='".__L_ONCE_NEWS__."?like=$id'><font size='2'>Подобається($likes)</font></a>";
				echo "<font size='3'> * </font>";
				echo "<a href='".__L_EDIT_NEWS__."?edit=$id'><font size='2'>Редагувати</font></a>";
				echo "<font size='3'> * </font>";
				echo "<a href='".__L_NEWS__."?delete=$id'><font size='2'>Видалити</font></a>";
			}
		echo "</div><div class='separator_news'></div>";
	}
	function ShowUsers(){
		$sql = "SELECT id, login, name, date_end FROM user";
		$quary = mysql_query($sql);
		echo "<div class='separator_news'></div>";
		echo "<table cellspacing='10' align='center' class='table_users'><tr><td width='400'>Логін</td><td width='400'>Останнього разу заходив</td><td align='right'>Зараз на сайті</td></tr></table>";
			while ($info_user = mysql_fetch_array($quary)){
				echo "<hr /><div>";
					if ($info_user['id'] == $_COOKIE['id']){
						$href = __L_PERSONAL_ACCOUNT__;
					}else{
						$href = __L_USER__."?user=".$info_user['id'];
					}
					$login = $info_user['login'];
					$date_end = date("Y-m-d|H:i:s", $info_user['date_end']);
					$time = mktime();
					if (($time-$info_user['date_end'])<600){
						$OnOff = "On";
					}else{
						$OnOff = "Off";
					}
					echo "<table cellspacing='10' align='center' class='table_users' name='UsersMausEnter'>";
					echo "<tr>";
						echo "<td width='400'><a href='$href'>$login</a></td><td width='400'>$date_end</td><td align='right'>$OnOff</td>";
					echo "</tr></table>";
				echo "</div>";
			}
		echo "<div class='separator_news'></div>";
	}
	function ShowUserTable($array){
		echo "<table border='0' cellspacing='0' cellpadding='5' class='table_user_content'>";
			foreach($array as $name => $link){?>			
				<tr>
					<td width="500"><?=$name?></td><td><?=$link?></td>
				</tr>
			<?php }
		echo "</table>";
	}
	function ShowCreateMessage(){
		echo "<form method='post' action='".__L_CREATE_MESSAGE__."?user=".$_GET['user']."'>
		<table class='create_news_table'>
			<tr>
				<td>";
					ShowEdit();
					echo "<textarea name='text' class='button' cols='89' rows='15' id='text' required></textarea>
				</td>
			</tr>
			<tr>
				<td align='center'><input name='bmessage' type='submit' value='Відправити' class='button' /></td>
			</tr>
		</table>
		</form>";
	}
	function CtrateMessage(){
		$text = trim(strip_tags($_POST['text']));
		$date = mktime();
		$id_out = $_COOKIE['id'];
		$id_in = $_GET['user'];
		$sql = "INSERT INTO user_message (text, date, id_out, id_in) VALUES ('$text', $date, $id_out, $id_in)";
		mysql_query($sql) or die(mysql_error());
		header("Location: ".__L_MAIN__);
	}
	function ShowInputMessage(){
		$sql = "SELECT * FROM user_message WHERE id_in='".$_COOKIE['id']."'";
		$quary = mysql_query($sql);
		$rows = mysql_num_rows($quary);
		if ($rows <= 0){
			return "У вас поки-що немає повідомлень";
		}
		while($info_message = mysql_fetch_array($quary)){
            $rez = '';
			$id_out = $info_message['id_out'];
			$sql = "SELECT login, id, time_grinvith FROM user WHERE id=$id_out";
			$user = mysql_query($sql);
			$user = mysql_fetch_array($user);
			$show = (int)$info_message['show'];
			$date = $info_message['date'];
			$date = date("Y-m-d/H:i:s", $date +($user['time_grinvith'])*3600);
			if ($show == 0){
				$user_login = "<u>".$user['login']."</u>";
			}else{
				$user_login = $user['login'];
			}
			$text = my_code($info_message['text']);
			if (strlen($text) >= 21){
				$text = substr($text, 0, 21);
				$text .= '...';
			}
			$href_user = __L_USER__."?user=".$user['id'];
			$href_message = __L_MESSAGE__."?message=".$info_message['id'];
			$rez .= "<table class='input_message_table'>
				<tr>
					<td width='250'><a href='$href_user'>$user_login</a></td><td width='640'><a href='$href_message'>$text</a></td>
				</tr>
				<tr>
					<td width='250'><hr />$date</td><td><hr />Видалити * Відовісти</td>
				</tr>
			</table>
			<div class='separator_message'></div>";
		}
		return $rez;
	}
	function ShowOutMessage(){
		$sql = "SELECT * FROM user_message WHERE id_out='".$_COOKIE['id']."'";
		$quary = mysql_query($sql);
		$rows = mysql_num_rows($quary);
		if ($rows <= 0){
			return "У вас поки-що немає повідомлень";
		}
		while($info_message = mysql_fetch_array($quary)){
            $rez = '';
			$id_in = $info_message['id_in'];
			$sql = "SELECT login, id, time_grinvith FROM user WHERE id=$id_in";
			$user = mysql_query($sql);
			$user = mysql_fetch_array($user);
			$show = (int)$info_message['show'];
			$date = $info_message['date'];
			$date = date("Y-m-d/H:i:s", $date +($user['time_grinvith'])*3600);
			if ($show == 0){
				$user_login = "<u>".$user['login']."</u>";
			}else{
				$user_login = $user['login'];
			}
			$text = my_code($info_message['text']);
			if (strlen($text) >= 21){
				$text = substr($text, 0, 21);
				$text .= '...';
			}
			$href_user = __L_USER__."?user=".$user['id'];
			$href_message = __L_MESSAGE__."?message=".$info_message['id'];
			$rez .= "<table class='input_message_table'>
				<tr>
					<td width='250'><a href='$href_user'>$user_login</a></td><td width='640'><a href='$href_message'>$text</a></td>
				</tr>
				<tr>
					<td width='250'><hr />$date</td><td></td>
				</tr>
			</table>
			<div class='separator_message'></div>";
		}
		return $rez;
	}
	function ShowMessage($message){
		$sql = "SELECT * FROM user_message WHERE id='$message'";
		$quary = mysql_query($sql);
		$rows = mysql_num_rows($quary);
		if ($rows <= 0){
			return "Таког овідомлення неіснує!";
		}
		$info_message = mysql_fetch_array($quary);
		if ($info_message['id_in'] == $_COOKIE['id']){
            $rez = '';
			$id_in = $info_message['id_in'];
			$sql = "SELECT login, id, time_grinvith FROM user WHERE id=$id_in";
			$user = mysql_query($sql);
			$user = mysql_fetch_array($user);
			$show = (int)$info_message['show'];
			$date = $info_message['date'];
			$date = date("Y-m-d/H:i:s", $date +($user['time_grinvith'])*3600);
			if ($show == 0){
				$user_login = "<u>".$user['login']."</u>";
			}else{
				$user_login = $user['login'];
			}
			$text = my_code($info_message['text']);
			if (strlen($text) >= 21){
				$text = substr($text, 0, 21);
				$text .= '...';
			}
			$href_user = __L_USER__."?user=".$user['id'];
			$href_message = __L_MESSAGE__."?message=".$info_message['id'];
			$rez .= "<table class='input_message_table'>
				<tr>
					<td width='250'><a href='$href_user'>$user_login</a></td><td width='640'><a href='$href_message'>$text</a></td>
				</tr>
				<tr>
					<td width='250'><hr />$date</td><td></td>
				</tr>
			</table>
			<div class='separator_message'></div>";
		}else{
			echo "Це овідомлення ризначено не вам!!!";
		}
		return $rez;
	}
	function CreateForum(){
		?>
		<center>
			<form method='post' action='<?=__L_CREATE_FORUM__?>'>
				<input type='text' name='name_forum' size='30' required />
				<input type='submit' name='create_forum' />
			</form>
		</center>
		<?php
	}
	function ShowForum(){
		echo "gsdfg";
	}

?>