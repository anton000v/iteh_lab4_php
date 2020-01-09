<body>
<?php
 echo  "<link rel='stylesheet' href='https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css' integrity='sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T' crossorigin='anonymous'>";

if(!empty($_POST['login']) && !empty($_POST['password']))
{	
	 $login = htmlentities($_POST['login']);
     $password = htmlentities($_POST['password']);
	 $login_and_password_as_string = htmlentities($_POST['login']) . " " . htmlentities($_POST['password']);
	 $accountsFile = 'accounts.txt';
	 
	 $lines = file($accountsFile);
	 $login_found = false;
	 $password_found = false;
	foreach($lines as $line)
	{
		$login_and_password_mas = explode(" ", $line);
		if($login_and_password_mas[0] == $login){
			$login_found = true;		
			if(trim($login_and_password_mas[1]) == $password){
				
				$password_found = true;
				break;
			}
		}
	}
	if($login_found && $password_found){
		echo "<p align='center'>Лааадно, велкам, " . $login . "</p>" . "<p align='center'>Поробуйте еще раз: <a href='http://localhost/laba4_var1/main.php'>На главную</a></p>";
	}
	else{
		echo "<br><p align = 'center'>Простите, извините.Не нашли. <br>Вернитесь и поробуйте еще раз: <a href='http://localhost/laba4_var1/main.php'>На главную</a></p>";
		if(!$login_found)
			echo "<p align='center'>Логин не найден</p>";
		elseif(!$password_found)
			echo "<p align='center'>Пароль не совпадает с существующим логином</p>";
	}
}
else
{   
    echo "<p align='center'>Введенные данные некорректны</p>". "<p align='center'>Поробуйте еще раз: <a href='http://localhost/laba4_var1/main.php'>На главную</a></p>";
}
?>
</body>