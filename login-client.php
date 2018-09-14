<?php
require "/php/connection.php";
$data = $_POST;

if (isset($data['do_login'])){
    $_SESSION['number'] = $data['clientphone'];
    $errors = array();
    $client = R::findOne('client', 'client_phone = ?', array($data['clientphone']));
    if ($client){
        if (password_verify($data['password'], $client-> client_pass )){
            $_SESSION['logged_name'] = $client -> client_name;
            $_SESSION['logged_surname'] = $client -> client_surname;
            $_SESSION['logged_patronymic'] = $client -> client_patronymic;
            $_SESSION['logged_phone'] = $client -> client_phone;
            $_SESSION['logged_id'] = $client -> id;
            header('Location:client-order.php');
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
                <div class="login-bg login-client">
                    <form action="login-client.php" method="post" >
                        <div class="reg-input">
                            <label for="clientphone">Номер телефона </label>
                            <input class="input-reg" id="phone" required  name="clientphone" type="text" value="<?php echo @$data['clientphone']; ?> ">
                        </div>
                        <div class="reg-input">
                            <label for="password">Пароль</label>
                            <input class="input-reg" name="password"     type="password" maxlength="16">
                        </div>
                        <div class="error">
                            <?php
                            if (!empty($errors))
                                echo array_shift($errors);
                            ?>
                        </div>
                        <div class="reg-new">
                            <a class="a-log" href="reg-client.php">Створити акаунт</a>
                            <button  class="butt-log" type="submit" name="do_login">Вхід</button>
                        </div>
                        <div class="refresh">

                                     <a href="refresh-client.php"><span>Відновлення паролю</span></a>

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
