<?php
require "/php/connection.php";
    $data = $_POST;
    if (isset($data['do_submit'])){
        if ($data['login'] == "admin"){
            if ($data['pass'] == "111"){
                header('Location:admin-orders.php');
            }
        }
    }




if ($_POST['token'] == $_SESSION['lastToken'])
{

}
else
{
    $_SESSION['lastToken'] = $_POST['token'];

}
?>
<!doctype html>
<html lang="en">
<head>
    <input type="hidden" name="token" value="<?php echo(rand(10000,99999));?>" />
    <meta charset="UTF-8">
    <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="style/css/reset.css">
    <link rel="stylesheet" href="style/css/bootstrap.css">
    <link rel="stylesheet" href="style/css/style.css">
    <link rel="stylesheet" href="style/css/admin.css">
    <title>CarGo</title>
    <style>
        html { overflow:  hidden; }
        div { height:  2000px; }
    </style>
</head>
<body>
        <div class="row justify-content-center">
            <div class="admin-sig">
                <div class="col-md-10">
                    <form action="admin.php" method="POST">
                        <h1>Admin</h1>
                        <input class="admin-log" name="login" type="text" placeholder="Login">
                        <input class="admin-log" name="pass" placeholder="Password" type="password"> <br>
                        <input class="butt-ac" name="do_submit" type="submit">
                    </form>
                </div>
            </div>
        </div>
</body>
</html>