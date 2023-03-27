<?php
$connect = mysqli_connect("localhost", "root", "", "Denisov");
include("header.php");
// Принятие id
$editTrenerId = $_POST['id'];
// Получение остальных данных из формы в общий массив
$newTrener['Surname'] = $_POST['Surname'];
$newTrener['Name'] = $_POST['Name'];
$newTrener['Patronymic'] = ($_POST['Patronymic'] == false) ? "NULL" : "'" . $_POST['Patronymic'] . "'";
$newTrener['Phone'] = $_POST['Phone'];
$newTrener['Password'] = $_POST['Password'];
$newTrener['Burthday'] = date($_POST['Burthday']);
$newTrener['Gender'] = $_POST['Gender'];
$newTrener['Awards'] = ($_POST['Awards'] == false) ? "NULL" : "'" . $_POST['Awards'] . "'";

// $newTrener['Photo'] = $_FILES["photo"]["name"];
// move_uploaded_file($_FILES["photo"]["tmp_name"], "img/".$_FILES["photo"]["name"]);
// Получение данных из таблицы в виде массива
$q_oldTrener = "SELECT * FROM `Users` WHERE `id_users` = $editTrenerId";
$oldTrener = $connect->query($q_oldTrener);
$oldTrener = mysqli_fetch_assoc($oldTrener);
// Подгонка данных из таблицы под массив, получаемый из формы
unset($oldTrener['id_users'], $oldTrener['Created_id'], $oldTrener['Rolo'], $oldTrener['Photo']);
$oldTrener['Patronymic'] = (empty($oldTrener['Patronymic'])) ? "NULL" : "'" . $oldTrener['Patronymic'] . "'";
$oldTrener['Awards'] = (empty($oldTrener['Awards'])) ? "NULL" : "'" . $oldTrener['Awards'] . "'";
// Проверка массивов на идентичность
if ($oldTrener != $newTrener) {
    // SQL запрос на редактирование
    $qUpdateTrenerData = "UPDATE `Users` SET `Surname`='" . $newTrener['Surname'] . "',`Name`='" . $newTrener['Name'] . "',`Patronymic`=" . $newTrener['Patronymic'] . ",`Burthday`='" . $newTrener['Burthday'] . "',`Gender`='" . $newTrener['Gender'] . "',`Phone`='" . $newTrener['Phone'] . "',`Password`='" . $newTrener['Password'] . "',`Awards`=" . $newTrener['Awards'] . "WHERE `id_users` = " . $editTrenerId;
    echo $qUpdateTrenerData;
    $UpdateTrenerData = $connect->query($qUpdateTrenerData);
    // Возвращение на начальную страницу результата
    $_SESSION['result'] = "Изменения внесены";
} else {
    // Возвращение на начальную страницу результата
    $_SESSION['result'] = "Информация идентична";
}
header('Location: editTrener.php?idTrener=' . $_POST['id']);
exit();
?>