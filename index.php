<?php
    session_start();



	/*if (isset($_GET['name']) && !empty($_GET['name']) ) {
		$name = $_GET['name'];
		setcookie('x', $name, time() + 3600);
	}elseif (isset($_COOKIE['x'])) {
		$name = $_COOKIE['x'];
	}else {
		$name = 'Guest';
	}*/

	if (isset($_GET['pass']) && !empty($_GET['pass'])){
        $pass = $_GET['pass'];
    }

	if (isset($_GET['repass']) && !empty('repass')) {
        $repass = $_GET['repass'];
    }

	if (isset($_GET['name']) && !empty($_GET['name']) && $repass == $pass) {
        $name = $_GET['name'];
    }else {$name = 'Guest';}

    function logins()
    {
        if (!(isset($_GET['repass']) && !empty('repass')) || !(isset($_GET['pass']) && !empty($_GET['pass'])) || !(isset($_GET['name']) && !empty($_GET['name']))) {
            print ('<h1>Не все поля заполнены</h1>');
        }
    }
    if ($repass == $pass) {
        $userPassword = $pass;
    }else {
        $userPassword = null;
    }

	$users = ['name' => $name, 'pass' => $userPassword];

    $str = serialize($users);
    setcookie('cookUser', $str, 3600);
?>


<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<script src="index.php"></script>
		<link rel="stylesheet" href="index.css">
		<title> Какая-то фигня</title>
	</head>
	<body>
		
		<div class="bg">
			<div class="h">
				<h1>Тест скриптов</h1>
			</div>


			<div class="scr">
				<h2>Скрипт</h2>
				<br><br><br>

				<div class="s">
					<p>Привет, <?php
                        $strM = unserialize($str);
                        if ($userPassword != null) {echo $strM['name'];} else {
                            echo 'Guest';
                        }
                        ?></p>
                    <p><?php
                            logins();
                            if (isset($_GET['pass']) && !empty($_GET['pass']) && (isset($_GET['repass']) && !empty($_GET['repass']))) {
                                if ($repass != $pass) {echo 'Пароли не совпадают!';}
                            }
                        ?></p>
					<form method="GET">
						<input type="text" name="name" placeholder="Name" /><br>
						<input type="password" name="pass" placeholder="Password" /><br>
						<input type="password" name="repass" placeholder="Repassword" />
						<input type="submit" onclick="">
					</form>
					<a href="index2.php">index2.php</a>
				</div>
			</div>
		</div>
	</body>
</html>