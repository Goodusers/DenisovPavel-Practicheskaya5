<?php 
	$connect = mysqli_connect("localhost", "root", "", "Denisov");

	include("header.php");
	session_start();
	//mysql_error($connect);
	$delId = $_GET['idTrener'];

	$del_trener = " DELETE FROM `Users` WHERE `id_users` = $delId ";
	$up_del_trener = $connect -> query($del_trener);

	header('Location: editTrener.php');

?>