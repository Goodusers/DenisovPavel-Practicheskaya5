	<?php
		$connect = mysqli_connect("localhost", "root", "", "Denisov"); // Подключение к базе данных
		$sql_query = "SELECT `Surname`, `Name`, `Patronymic`, `Photo`, `Phone`, `Awards` FROM `Users` WHERE `Rolo`=3"; // запись в переменную sql запроса на показ данных из таблицы Users, где роль равна 3(Тренера)
		$result = mysqli_query($connect, $sql_query); // функция обработки sql запроса
		include("header.php"); // Подключение стороннего файла
	?>

	<div class="cards">
		
		<?php
			while($trener = mysqli_fetch_assoc($result)){
				?>

				<div class="card">
					<img src="/img/<?=$trener["Photo"]?>" alt="<?=$trener["Name"]?>">
					<h2><?=$trener["Name"]." ".$trener["Patronymic"]." ".$trener["Surname"];?></h2>
					<p><?=$trener["Phone"];?></p>
					<p><?=$trener["Awards"];?></p>
				</div>
				<?php 
			
			}


		?>
	</div>
	
</body>
</html>
