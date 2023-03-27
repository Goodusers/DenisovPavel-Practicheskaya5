<?php
function photoSecure($photo)
{
    global $photo;
    $type = $photo['type'];
    $size = $photo['size'];

    if (
        $type != "img/png" &&
        $type != "img/jpg" &&
        $type != "img/jpeg" &&
        $type != "img/gif"
    ) {
        return false;
    }
    if ($size > 5 * 1024 * 1024) return false;
    return true;
}

function loadPhoto($photo)
{
    $type = $photo['type'];
    $photo_name = md5(microtime()) . '.' . substr($type, strlen("img/"));
    $dir = "./img/";
    $upload = $dir . $photo_name;

    if (!move_uploaded_file($photo['tmp_name'], $upload)) {
        $photo_name = "Не загружено";
        return false;
    }    
    return $photo_name;
}
?>