<?php

	$array1 = array(
				"Головна сторінка" => __L_MAIN__,
				"Особистий кабінет" => __L_PERSONAL_ACCOUNT__,
				"Гостьова книга" => __L_GUEST_BOOK__,
				"Форум" => __L_FORUM__,
				"Новини" => __L_NEWS__,
				"Користувачі" => __L_USERS__,
				"Вийти" => __L_MAIN__."?exit"
				);

	$array2 = array(
				"Головна сторінка" => __L_MAIN__,
				"Реєстрація" => __L_REGISTRATION__,
				"Вхід" => __L_ENTRANCE__,
				"Гостьова книга" => __L_GUEST_BOOK__,
				"Форум" => __L_FORUM__,
				"Користувачі" => __L_USERS__,
				"Новини" => __L_NEWS__
				);

	$array3 = array(
				//"Персонаж" => __L_PERSONAGE__,
				"Особистий кабінет" => __L_PERSONAL_ACCOUNT__,
				"Редагувати дані" => __L_EDIT_ACCOUNT__,
				"<Повідомлення" => __L_IN_MESSAGE__,
				">Повідомлення" => __L_OUT_MESSAGE__,
				"Вийти" => __L_MAIN__."?exit"
				);

	$array4 = array(
				"Ім'я:" => "<input type='text' name='name' placeholder='Новае ім\140я' size='30' class='button' /><td><input type='submit' name='bname' class='button' value='Виправити' /></td>",
				"Логін:" => "<input type='text' name='login' placeholder='Новий логін' size='30' class='button' /><td><input type='submit' name='blogin' class='button' value='Виправити' /></td>",
				"Стать:" => "Чоловіча:<input type='radio' name='sex' value='1' class='button' checked /> Жіноча:<input type='radio' name='sex' value='0' class='button' /><td><input type='submit' name='bsex' class='button' value='Виправити' /></td>",
				"День народження:" => "День: <select name='ageday' size='1' class='button'>".EnterCheckBox(1, 31)."}</select> Місяць: <select name='agemonth' size='1' class='button'>".EnterCheckBox(1, 12)."}</select> Рік: <select name='ageyear' size='1' class='button'>".EnterCheckBox(1970, 2013)."}</select><td><input type='submit' name='bage' class='button' value='Виправити' /></td>",
				"Часовий пояс:" => "<input type='number' name='time_grinvith' placeholder='Часовий пояс' size='30' class='button' /><td><input type='submit' name='btime_grinvith' class='button' value='Виправити' /></td>",
				"Електонна пошта:" => "<input type='text' name='email' placeholder='Нова поштова адреса' size='30' class='button' /><td><input type='submit' name='bemail' class='button' value='Виправити' /></td>",
				"Пароль:" => "<input type='password' name='lostpassword' placeholder='Старий пароль' size='30' class='button' /><br /><input type='password' name='password' placeholder='Новий пароль' size='30' class='button' /><br /><input type='password' name='repeat_password' placeholder='Повторіть новий пароль' size='30' class='button' /><td><input type='submit' name='bpassword' class='button' value='Виправити' /></td>",
				"Кількість новин:" => "<input type='number' name='count_news' size='30' class='button' /><td><input type='submit' name='bcount_news' class='button' value='Виправити' /></td>",
				"Кількість персонатьних повідомлень:" => "<input type='number' name='count_personal_message' size='30' class='button' /><td><input type='submit' name='bcount_personal_message' class='button' value='Виправити' /></td>",
				"Кількість повідомлень в темі:" => "<input type='number' name='count_topick_message' size='30' class='button' /><td><input type='submit' name='bcount_topick_message' class='button' value='Виправити' /></td>",
				"Кількість повідомлень в гостьовій книзі:" => "<input type='number' name='count_gbook_message' size='30' class='button' /><td><input type='submit' name='bcount_gbook_message' class='button' value='Виправити' /></td>"
				);

	$array5 = array(
				"Повідомлення" => __L_CREATE_MESSAGE__."?user=".$_GET['user'],
				"Інформація" => __L_USER__."?user=".$_GET['user'],
				//"Персонаж" => __L_PERSONAGE_U__,
				);
?>