<?php
require "/php/connection.php";
$data=$_POST;
if (isset($data['do_signup'])){
    $errors = array();
    $errors2 = array();
        if (!(trim($data['length']) == '' || trim($data['width']) == '' || trim($data['heightcar']) == '' || trim($data['weightcar']) == ''))
         {
             $car = R::load('car', $_SESSION['logged_id']);
             $car->car_length = $data['length'];
             $car->car_width = $data['width'];
             $car->car_heightcar = $data['heightcar'];
             $car->car_weightcar = $data['weightcar'];
             R::store($car);

        } elseif(!($data['password'] == '' || $data['password2'] != $data['password'])){
            $transporter = R::load('transporter', $_SESSION['logged_id']);
            $transporter -> transporter_pass = password_hash($data['password'], PASSWORD_DEFAULT);
            R::store($transporter);
    } else {
            $errors[] = 'Заповніть поля для зміни або пароль';
            }

}


if (isset($_SESSION['logged_name'])){

} else {header('Location: ../index.php');}


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
<div class="bg">
    <?php include ("transporter-header.php"); ?>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-11">
                <div class="profile-trans">
                    <span>Ваше ім'я: </span>
                    <div class="name"> <?php echo $_SESSION['logged_name']; ?>  </div>
                    <br>
                    <span>Ваше прізвище: </span>
                    <div class="name"> <?php echo $_SESSION['logged_surname']; ?> </div>
                    <br>
                    <span>По-батькові: </span>
                    <div class="name"> <?php echo $_SESSION['logged_patronymic']; ?> </div>
                    <br>
                    <span>Номер телефону: </span>
                    <div class="name"> <?php echo $_SESSION['logged_phone']; ?> </div>
                    <br>
                    <form action="transporter-profile.php" method="post">
                    <span>Довжина кузова: </span>
                    <div class="name"> <?php echo $_SESSION['car_length']; ?> <span>(м.)</span>
                        <input class="input-change" maxlength="4"  name="length" value="<?php echo @$data2['length']; ?>" type="text" pattern="[0-9]{,3}">
                    </div>
                    <br>
                    <span>Ширина кузова: </span>
                    <div class="name"> <?php echo $_SESSION['car_width']; ?> <span>(м.)</span>
                        <input class="input-change" maxlength="4"  name="width" value="<?php echo @$data2['width']; ?>" type="text" pattern="[0-9]{,3}">
                    </div>
                    <br>
                    <span>Висота кузова: </span>
                    <div class="name"> <?php echo $_SESSION['car_height']; ?> <span>(м.)</span>
                        <input class="input-change" maxlength="4"  name="heightcar" value="<?php echo @$data2['heightcar']; ?>" type="text" pattern="[0-9]{,3}">
                    </div>
                    <br>
                    <span>Вантажоємність: </span>
                    <div class="name"> <?php echo $_SESSION['car_weight']; ?> <span>(т.)</span>
                        <input class="input-change" maxlength="4"  name="weightcar" value="<?php echo @$data2['weightcar']; ?>" type="text" pattern="[0-9]{,3}">
                    </div>
                    <br>
                    <span class="pass-new">Зміна паролю: </span> <br>

                        <div class="profile-input">
                            <label for="password">Новий пароль</label>
                            <input class="input-reg" name="password" type="password" maxlength="16">
                        </div>
                        <div class="profile-input">
                            <label for="password2">Підтвердження</label>
                            <input class="input-reg" name="password2" type="password" maxlength="16">
                        </div>
                        <div class="error">
                            <?php
                            if (!empty($errors))
                                echo array_shift($errors);
                            ?>
                        </div>
                        <button  class="butt-pass" type="submit" name="do_signup">Ок</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>