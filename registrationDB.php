<?php 
	$connect = mysqli_connect("localhost", "root", "", "Denisov");
	if(!empty($_POST)){ // empty() - Проверяет на пустоту переменной
		$surname = $_POST["surname"];
		$name = $_POST["name"];
		$patronymic = !empty($_POST["patronymic"])?$_POST["patronymic"]:"null";
		$burthday = $_POST["burthday"];
		$phone = $_POST["phone"];
		//$photo = "Trener4.png";

		$photo = $_FILES["photo"]["name"];
		move_uploaded_file($_FILES["photo"]["tmp_name"], "img/".$photo);

		$gender = $_POST["Gender"];
		$pass = $_POST["pass"];
		$created_id = date("Y-m-d H:i:s");

		$query = "INSERT INTO `Users` (`id_users`, `Surname`, `Name`, `Patronymic`, `Burthday`, `Photo`, `Gender`, `Phone`, `Password`, `Rolo`, `Created_id`) VALUES (NULL, '$surname', '$name', '$patronymic', '$burthday', '$photo', '$gender', '$phone', '$pass', '2', '$created_id')";
		$result = mysqli_query($connect, $query); //mysqli_query(); Выполняет запросы SQL
		if($result){
			echo "<script>location.href='/userpage.php';</script>"; // Устанавливает или возвращает содержимое URL 
		}
		else{
			echo "<script>alert('Ошибка, попробуйте снова!');</script>";
			echo mysqli_error($connect);
			echo $query;
		}
		if($connect == false){
			echo ('Ошибка: Невозможно подключиться к MySQL ' . mysqli_connect_error()); // ПРоверка на устанвку соединения
		}
		else{
			echo ('Соединение установлено успешно!');
		}
	}
?>