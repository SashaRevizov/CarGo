<?php

require "/php/connection.php";
$data = $_POST;

if (isset($data['do_signup'])){
    $errors = array();

    if (trim($data['transporterfirstname']) == '' ) {
        $errors[] = 'Введіть імя';
    }
    if (trim($data['transportersecondname']) == '' ) {
        $errors[] = 'Введіть прізвище   ';
    }
    if (trim($data['transporterpatronymic']) == '' ) {
        $errors[] = 'Введіть по-батькові';
    }
    if (trim($data['transporterphone']) == '' ) {
        $errors[] = 'Введіть номер телефона';
    }
    if ($data['password'] == '' ) {
        $errors[] = 'Введіть пароль';
    }
    if ($data['password2'] != $data['password'] ) {
        $errors[] = 'Не вірне підтвердження паролю';
    }
    if ($data['length'] == '' ) {
        $errors[] = 'Введіть довжину кузова';
    }
    if ($data['width'] == '' ) {
        $errors[] = 'Введіть ширину кузова';
    }
    if ($data['heightcar'] == '' ) {
        $errors[] = 'Введіть висоту кузова';
    }
    if ($data['weightcar'] == '' ) {
        $errors[] = 'Введіть тоннаж машини';
    }
    if ( R::count('transporter', "transporter_phone = ?", array($data['transporterphone']))>0 ){
        $errors[] = 'Користувач з таким номером вже існує';
    }



    if (empty($errors)){
        $transporter = R::dispense('transporter');
        $transporter -> transporter_name = $data['transporterfirstname'];
        $transporter -> transporter_surname = $data['transportersecondname'];
        $transporter -> transporter_patronymic = $data['transporterpatronymic'];
        $transporter -> transporter_phone = $data['transporterphone'];
        $transporter -> answer = $data['answer'];
        $transporter -> transporter_pass = password_hash($data['password'], PASSWORD_DEFAULT);
        R::store($transporter);
        $car = R::dispense('car');
        $car -> car_length = $data['length'];
        $car -> car_width = $data['width'];
        $car -> car_heightcar = $data['heightcar'];
        $car -> car_weightcar = $data['weightcar'];
        R::store($car);
        header('Location:login-transporter.php');
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>CarGo</title>
    <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
    <link rel="stylesheet" href="style/css/reset.css">
    <link rel="stylesheet" href="style/css/bootstrap.css">
    <link rel="stylesheet" href="style/css/style.css">

</head>
<body>
<div class="bg-reg">
    <?php include ("header.php"); ?>
    <div class="container">
        <div class="row justify-content-md-center">
            <div class="col-md-7">
                <div class="reg-transporter">
                    <a class="change-left" href="reg-client.php">Відправник</a>
                    <form action="reg-transporter.php" method="post" >
                        <div class="reg-input">
                            <label for="transporterfirstname">Ім'я</label>
                            <input required class="input-reg" maxlength="20"  type="text" name="transporterfirstname" value="<?php echo @$data['transporterfirstname'] ?>">
                        </div>

                        <div class="reg-input">
                            <label for="transportersecondname">Прізвище</label>
                            <input required class="input-reg" maxlength="20"  type="text" name="transportersecondname" value="<?php echo @$data['transportersecondname'] ?>">
                        </div>

                        <div class="reg-input">
                            <label for="transporterpatronymic">По-батькові</label>
                            <input required class="input-reg" maxlength="20"  type="text" name="transporterpatronymic" value="<?php echo @$data['transporterpatronymic'] ?>">
                        </div>

                        <div class="reg-input">
                            <label for="transporterphone">Номер телефона </label>
                            <input required class="input-reg" id="phone"  name="transporterphone" type="text" value="<?php echo @$data['transporterphone']; ?> ">
                        </div>

                        <div class="reg-input">
                            <label  for="password">Пароль </label>
                            <input required class="input-reg" minlength="4" maxlength="16" name="password" type="password" >
                        </div>

                        <div class="reg-input">
                            <label  for="password2">Підтвердженя </label>
                            <input required class="input-reg"  minlength="4" maxlength="16"  name="password2" type="password">
                        </div>
                        <div class="reg-input">
                            <label  for="answer">Секретне слово</label>
                            <input required class="input-reg"   name="answer" value="<?php echo @$data['answer']; ?>" type="text" pattern="[0-9]{,3}">
                        </div>
                </div>
                <div class="reg-car">
                        <h2>Параметри машини</h2>
                        <div class="reg-input">
                            <label  for="length">Довжина (м.) </label>
                            <input required class="input-reg" maxlength="4"  name="length" value="<?php echo @$data['length']; ?>" type="text" pattern="[0-9]{,3}">
                        </div>
                        <div class="reg-input">
                            <label  for="width">Ширина (м.) </label>
                            <input required class="input-reg" maxlength="4"  name="width" value="<?php echo @$data['width']; ?>" type="text" pattern="[0-9]{,3}">
                        </div>
                        <div class="reg-input">
                            <label  for="heightcar">Висота (м.) </label>
                            <input required class="input-reg" maxlength="4"  name="heightcar" value="<?php echo @$data['heightcar']; ?>" type="text" pattern="[0-9]{,3}">
                        </div>
                        <div class="reg-input">
                            <label  for="weightcar">Вантажоємність (т.) </label>
                            <input required class="input-reg" maxlength="4"  name="weightcar" value="<?php echo @$data['weightcar']; ?>" type="text" pattern="[0-9]{,3}">
                        </div>

                        <?php
                        if (!empty($errors))
                            echo array_shift($errors);
                        ?>
                        <button class="butt" type="submit" name="do_signup">Реєстрація</button>
                    </form>
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
</div>
</body>
</html>