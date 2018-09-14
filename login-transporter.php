<?php
require "/php/connection.php";
$data = $_POST;

if (isset($data['do_login'])){
    $errors = array();
    $transporter = R::findOne('transporter', 'transporter_phone = ?', array($data['transporter_phone']));

    if ($transporter){
        if (password_verify($data['password'], $transporter-> transporter_pass )){
            $_SESSION['logged_name'] = $transporter -> transporter_name;
            $_SESSION['logged_surname'] = $transporter -> transporter_surname;
            $_SESSION['logged_patronymic'] = $transporter -> transporter_patronymic;
            $_SESSION['logged_phone'] = $transporter -> transporter_phone;
            $_SESSION['logged_id'] = $transporter -> id;
            $car = R::findOne('car', 'id = ?', array($_SESSION['logged_id']));
            $_SESSION['car_length'] = $car -> car_length;
            $_SESSION['car_width'] = $car -> car_width;
            $_SESSION['car_height'] = $car -> car_heightcar;
            $_SESSION['car_weight'] = $car -> car_weightcar;


            header('Location:transporter-order.php');
        } else {
            $errors[] = 'Невірний пароль';
        }
    } else {
        $errors[] = 'Номер не зареєстрований';
    }
//Запрет отправки формы
    if ($_POST['token'] == $_SESSION['lastToken'])
    {

}
    else
    {
        $_SESSION['lastToken'] = $_POST['token'];

}
//Конец
}
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>CarGo</title>
    <link rel="stylesheet" href="style/css/reset.css">
    <link rel="stylesheet" href="style/css/bootstrap.css">
    <link rel="stylesheet" href="style/css/style.css">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
</head>
<body>
<div class="bg-reg">
    <input type="hidden" name="token" value="<?php echo(rand(10000,99999));?>" />
    <?php include ("header.php"); ?>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-5">
                <div class="login-bg login-transporter">
                    <form action="login-transporter.php" method="post">
                        <div class="reg-input">
                            <label for="transporter_phone">Номер телефона </label>
                            <input required class="input-reg" id="phone"  name="transporter_phone" type="text" value="<?php echo @$data['transporter_phone']; ?> ">
                        </div>
                        <div class="reg-input">
                            <label for="password">Пароль</label>
                            <input required class="input-reg" name="password" type="password">
                        </div>
                        <div class="error">
                            <?php
                            if (!empty($errors))
                                echo array_shift($errors);
                            ?>
                        </div>
                        <div class="reg-new">
                            <a class="a-log" href="reg-transporter.php">Створити акаунт</a>
                            <button  class="butt-log" type="submit" name="do_login">Вхід</button>
                        </div>
                        <div class="refresh">
                            <a href="refresh-transporter.php"><span>Відновлення паролю</span></a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="js/jquery.maskedinput.min.js"></script>
<script>
    $(document).ready(function() {
        $("#phone").mask("+38 (999) 999 99 99");
    });
</script>
</body>
</html>
