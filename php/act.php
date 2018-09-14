<?php
include_once "smsc_api.php";

if (isset($_POST["sendsms"])) {
    $r = send_sms($_POST["phone"], "Ваш код подтверждения: ".ok_code($_POST["phone"]));

    if ($r[1] > 0)
        echo "Код подтверждения отправлен на номер ".$_POST["phone"];
}

if (isset($_POST["ok"])) {
    $oc = ok_code($_POST["phone"]);

    if ($oc == $_POST["code"])
        echo "Номер активирован";
    else
        echo "Неверный код подтверждения";
}

function ok_code($s) {
    return hexdec(substr(md5($s."<секретная строка>"), 7, 5));
}
?>
