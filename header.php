<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
	<link rel="stylesheet" href="style.css">
</head>
<?php 
	session_start();
	$resultin = $_SESSION['result'];
 ?>
<body>
	<header>
		<div class="logo">
			<h1>Фитнес клуб</h1>
		</div>
		<nav>
			<a href="/">Главная</a>
			<a href="/">Наши тренеры</a>
			<a href="/addTrener.php">Добавить тренера</a>
			<a href="/editTrener.php">Управление тренерами</a>
		</nav>
	</header>
</body>
</html>