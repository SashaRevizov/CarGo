<?php
require "/php/connection.php";
    $data = $_POST;

if (isset($data['do_signup'])){
    $errors = array();

    if (trim($data['clientfirstname']) == '' ) {
        $errors[] = 'Введіть імя';
    }

    if (trim($data['clientsecondname']) == '' ) {
        $errors[] = 'Введіть прізвище   ';
    }
    if (trim($data['clientpatronymic']) == '' ) {
        $errors[] = 'Введіть по-батькові';
    }
    if (trim($data['clientphone']) == '' ) {
        $errors[] = 'Введіть телефон';
    }
    if ($data['password'] == '' ) {
        $errors[] = 'Введіть пароль';
    }
    if ($data['password2'] != $data['password'] ) {
        $errors[] = 'Не вірне підтвердження паролю';
    }
    if ( R::count('client', "client_phone = ?", array($data['clientphone']))>0 ){
        $errors[] = 'Користувач з таким номером вже існує';
    }


    if (empty($errors)){
        $client = R::dispense('client');
        $client -> client_name = $data['clientfirstname'];
        $client -> client_surname = $data['clientsecondname'];
        $client -> client_patronymic = $data['clientpatronymic'];
        $client -> client_phone = $data['clientphone'];
        $client -> answer = $data['answer'];
        $client -> client_pass = password_hash($data['password'], PASSWORD_DEFAULT);
        R::store($client);
        header('Location:login-client.php');
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
                <div class="reg-client">
                    <a class="change-right" href="reg-transporter.php">Перевізник</a>
                    <form id="reg-client" action="reg-client.php" method="post" >
                        <div class="reg-input">
                            <label for="clientfiirstname">Ім'я</label>
                            <input required class="input-reg" maxlength="18"  type="text" name="clientfirstname" value="<?php echo @$data['clientfirstname'] ?>">
                        </div>

                        <div class="reg-input">
                            <label for="clientsecondname">Прізвище</label>
                            <input required class="input-reg" maxlength="18"  type="text" name="clientsecondname" value="<?php echo @$data['clientsecondname'] ?>">
                        </div>

                        <div class="reg-input">
                            <label for="userclientpatronymic">По-батькові</label>
                            <input required class="input-reg" maxlength="18"  type="text" name="clientpatronymic" value="<?php echo @$data['clientpatronymic'] ?>">
                        </div>

                        <div class="reg-input">
                            <label for="clientphone">Номер телефона </label>
                            <input required class="input-reg" id="phone"   name="clientphone" type="text" value="<?php echo @$data['clientphone']; ?> ">
                        </div>

                        <div class="reg-input">
                            <label  for="password">Пароль </label>
                            <input required class="input-reg" maxlength="16" name="password" type="password" >
                        </div>

                        <div class="reg-input">
                            <label  for="password2">Підтвердженя </label>
                            <input required class="input-reg"  minlength="4" maxlength="16"  name="password2" type="password">
                        </div>
                       
                        <div class="reg-input">
                            <label  for="answer">Секретне слово</label>
                            <input required class="input-reg"   name="answer" value="<?php echo @$data['answer']; ?>" type="text" pattern="[0-9]{,3}">
                        </div>
                        <div class="error">
                            <?php
                            if (!empty($errors))
                                echo array_shift($errors);
                            ?>
                        </div>
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