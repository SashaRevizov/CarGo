<?php
require "/php/connection.php";
$data = $_POST;
if (isset($data['do_login'])){
    $errors = array();
    $client = R::findOne('client', 'client_phone = ?', array($data['phone']));
    if ($client){
        if ($client -> answer == $data['answer']){
            $client -> client_pass = password_hash($data['password2'], PASSWORD_DEFAULT);
            R::store($client);
            header('Location:login-client.php');
        } else{$errors[] = 'Не вірне секретне слово';}
    } else{$errors[] = 'Номер не зареєстрований';}





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
                    <form action="refresh-client.php" method="post" >
                        <div class="reg-input">
                            <label for="clientphone">Номер телефону</label>
                            <input class="input-reg" id="phone" required  name="phone" type="text">
                        </div>
                        <div class="reg-input">
                            <label for="answer">Секретне слово</label>
                            <input class="input-reg" id="answer" required  name="answer" type="text">
                        </div>
                        <div class="reg-input">
                            <label for="password">Новий пароль</label>
                            <input class="input-reg" id="password" required  name="password" type="password" >
                        </div>
                        <div class="reg-input">
                            <label for="password">Підтвердження</label>
                            <input class="input-reg" name="password2" required type="password" maxlength="16">
                        </div>
                        <div class="error">
                            <?php
                            if (!empty($errors))
                                echo array_shift($errors);
                            ?>
                        </div>
                        <div class="reg-new">
                            <button  class="butt-log" type="submit" name="do_login">Змінити</button>
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
