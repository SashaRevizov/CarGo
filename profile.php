<?php
require "/php/connection.php";
$data=$_POST;
    if (isset($data['do_signup'])){
            $errors = array();
        if (trim($data['password']) == '' ) {
            $errors[] = 'Введіть пароль';
        }
        if ($data['password2'] != $data['password'] ) {
            $errors[] = 'Не вірне підтвердження паролю';
        }
        if(empty($errors)){
            $client = R::load('client', $_SESSION['logged_id']);
            $client -> client_pass = password_hash($data['password'], PASSWORD_DEFAULT);
            R::store($client);
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
    <?php include ("client-header.php"); ?>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-11">
                <div class="profile">
                    <span>Ваше ім'я: </span>
                            <div class="name"> <?php echo $_SESSION['logged_name']; ?> </div>
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
                    <span class="pass-new">Зміна паролю: </span> <br>
                    <form action="profile.php" method="post">
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