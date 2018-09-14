<?php
require "php/connection.php";
$data = $_POST;
$transporter = R::findCollection('transporter', "ORDER BY 'id' DESC");
while ($transporters = $transporter -> next()){
    $id_t[] = $transporters -> id;
    $name_t[] = $transporters -> transporter_name;
    $surname_t[] = $transporters -> transporter_surname;
    $patronymic_t[] = $transporters -> transporter_patronymic;
    $phone_t[] = $transporters -> transporter_phone;
}


if (isset($data['del_transporter'])){
         $transporter = R::load('transporter', $data['id_transporter']);
         $car = R::load('car', $data['id_transporter']);
            R::trash($car);
           R::trash($transporter);
           header('Location:admin-transporters.php');
}

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="style/css/reset.css">
    <link rel="stylesheet" href="style/css/bootstrap.css">
    <link rel="stylesheet" href="style/css/admin.css">
    <title>CarGo</title>
    <style>
        html { overflow:  hidden; }
        div { height:  2000px; }
    </style>
</head>
<body>
<div class="toolbar">
    <h2>CarGo</h2>
</div>

<a href="admin-clients.php">
    <div class="users">
        <span>Замовники</span>
    </div>
</a>
<a href="admin-transporters.php">
    <div class="users">
        <span>Перевізники</span>
    </div>
</a>

<a href="admin-orders.php">
    <div class="orders">
        <span>Замовлення</span>
    </div>
</a>

<div class="black-bar"></div>
        <form action="admin-transporters.php" method="post" class="del">
            <span>Id користувача для видалення</span>
            <input type="text" name = "id_transporter" class="del_id">
            <input class='dell'  name='del_transporter' type='submit' value='Видалити'>
                    
        </form> 
<div class="clients">
    <span>ID</span> <span>Ім'я</span> <span>Призвіще</span> <span>По-батькові</span> <span>Номер телефону</span>
    <div class="row space">

        <div class="col-md-1">
            <div class="order_number">
                <?php
                for ($i=0; $i < R::count('transporter'); $i++){
                    if($id_t[$i]!="")
                        echo "$id_t[$i]<br/><br/>";

                }
                ?>
            </div>
        </div>
        <div class="col-md-2">
            <div class="order_type">
                <?php
                for ($i=0; $i < R::count('transporter'); $i++){
                    if($name_t[$i]!="")
                        echo "$name_t[$i]<br/><br/>";
                }
                ?>
            </div>
        </div>

        <div class="col-md-2 ">
            <div class="order-city2">
                <?php
                for ($i=0; $i < R::count('transporter'); $i++){
                    if($surname_t[$i]!="")
                        echo "$surname_t[$i]<br/><br/>";
                }
                ?>
            </div>
        </div>
        <div class="col-md-2 ">
            <div class="order-mess">
                <?php
                for ($i=0; $i < R::count('transporter'); $i++)
                    if($patronymic_t[$i]!="")

                        echo "$patronymic_t[$i]<br/><br/>";

                ?>
            </div>
        </div>
        <div class="col-md-4">
            <div class="order-mess  phone_space ">
                <?php
                for ($i=0; $i < R::count('transporter'); $i++)
                    if($phone_t[$i]!="")
                        echo "$phone_t[$i]<br/><br/>";
                ?>
            </div>
        </div>
        
    </div>
</div>
</body>
</html>