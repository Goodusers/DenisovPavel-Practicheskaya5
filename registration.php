<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
	<link rel="stylesheet" href="style.css">
</head>
<body>
	<div class="container">
		<div class="zagolovok"><h2>Регистрация</h2></div>
		<form action="/registrationDB.php" method="POST" enctype="multipart/form-data">
			<div class="input-group">
				<label for="surname">Введите фамилию</label>
				<input type="text" id="surname" name="surname">
			</div>
			<div class="input-group">
				<label for="name">Введите имя</label>
				<input type="text" id="name" name="name">
			</div>
			<div class="input-group">
				<label for="patronymic">Введите отчество</label>
				<input type="text" id="patronymic" name="patronymic">
			</div>
			<div class="input-group">
				<label for="burthday">Введите дату рождения</label>
				<input type="date" id="burthday" name="burthday">
			</div>
			<div class="input-group">
				<label for="phone">Введите номер телефона</label>
				<input type="text" id="phone" name="phone">
			</div>
			<div class="">
				<input type="file" id="photo" name="photo">
			</div>
			<label for="genderM" style="margin:5px;">Выберите пол</label>
			<div class="ig-radio">	
				<label for="genderM">M</label><input type="radio" id="genderM" value="M" name="gender">
				<label for="genderW">Ж</label><input type="radio" id="genderW" value="W" name="gender">
			</div>
			<div class="input-group">
				<label for="pass">Введите пароль</label>
				<input type="password" id="pass" name="pass">
			</div>
			<div class="input-gr">
				<input type="submit" value="Добавить">
			</div>
		</form>
	</div>
</body>
</html>