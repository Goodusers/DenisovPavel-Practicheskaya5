<link rel="stylesheet" href="edit.css">
<?php
$connect = mysqli_connect("localhost", "root", "", "Denisov");

include('header.php');

$res = $connect->query("SELECT * FROM `Users` WHERE `Rolo`=3");
$s_result = $_SESSION['result'];

$q_1st_id = "SELECT id_users FROM Users WHERE Rolo=3 limit 1";
$get_1st_id = $connect->query($q_1st_id);

$idTrener = !empty($_GET['idTrener']) ? $_GET['idTrener'] : 1;
$query = "SELECT * from Users where id_users=" . $idTrener;
$trenerInfo = mysqli_query($connect, $query);
$trenerInfo = mysqli_fetch_array($trenerInfo);
?> 
<div class="container flex">
    <div class="trener-list">
        <?php
        while ($trener = mysqli_fetch_assoc($res)) {
        ?>
            <div class="trener-icon flex">
                <p><?= $trener["Surname"] . " " . $trener["Name"] . " " . $trener["Patronymic"]; ?></p>
                <div>
                    <a href="?idTrener=<?= $trener['id_users']; ?>"><button class="btn-edit">&#9998</button></a>
                    <a href="/delTrenerDB.php?idTrener=<?= $trener['id_users']; ?>"><button class="btn-del">&#215</button></a>
                </div>
            </div>
        <?php
        }
        ?>
    </div>
    <div class="form-edit">
        <div class="container_flex">
            <form action="/editTrenerDB.php" method="POST" class="edit">
                <div class="zagolovok"><h2>Добавить тренера</h2></div>
                <div class="input-group"><input type="text" name="Surname" id="surname" placeholder="Фамилия" value="<?= $trenerInfo['Surname']; ?>" /></div>
                <div class="input-group"><input type="text" name="Name" placeholder="Имя" value="<?= $trenerInfo['Name']; ?>" /></div>
                <div class="input-group"><input type="text" name="Patronymic" placeholder="Отчество" value="<?= $trenerInfo['Patronymic']; ?>" /></div>
                <div class="group"><input type="file" name="Photo" placeholder="Название фото" /><label for=""></label></div>
                <label for="" style="text-align: center">Выберите пол</label>
                <div class="ig-radio">
                    <label for="GenderM"><input type="radio" name="Gender" value="M" id="GenderM" <?= ($trenerInfo['GenderM'] == 'M') ? 'checked' : ""; ?>>Муж.</label>
                    <label for="GenderW"><input type="radio" name="Gender" value="W" id="GenderW" <?= ($trenerInfo['GenderW'] == 'W') ? 'checked' : ""; ?>>Жен.</label>
                </div>
                <div class="input-group"><input type="number" name="Phone" placeholder="Телефон" value="<?= $trenerInfo['Phone']; ?>" /></div>
                <div class="input-group"><input type="password" name="Password" placeholder="Пароль" value="<?= $trenerInfo['Password']; ?>"><label for=""></label></div>
                <div class="input-group"><input type="date" name="Burthday" placeholder="Дата рождения" value="<?= $trenerInfo['Burthday']; ?>"><label for=""></label></div>
                <div class="input-group"><input type="text" name="Awards" placeholder="Награды" value="<?= $trenerInfo['Awards']; ?>"><label for=""></label></div>
                <input value="<?= $trenerInfo['id_users']; ?>" name="id" style="display: none;"></input>
                <div class="input-group"><button class="sub-btn" type="submit">Обновить</button></div>
                <p><?= $_SESSION['result'] ?></p>
            </form>
        </div>
    </div>
</div>
</body>
</html>
<?php
$_SESSION['result']=null;
?>