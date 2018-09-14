<?php
require "php/connection.php";
$data = $_POST;
$client = R::findCollection('client', "ORDER BY 'id' DESC");
while ($clients = $client -> next()){
            $id_c[] = $clients -> id;
            $name_c[] = $clients -> client_name;
            $surname_c[] = $clients -> client_surname;
            $patronymic_c[] = $clients -> client_patronymic;
            $phone_c[] = $clients -> client_phone;
        }

if (isset($data['del_client'])){
         $client = R::load('client', $data['id_client']);
           R::trash($client);

           header('Location:admin-clients.php');
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
        <form action="admin-clients.php" method="post" class="del">
            <span>Id користувача для видалення</span>
            <input type="text" name = "id_client" class="del_id">
            <input class='dell'  name='del_client' type='submit' value='Видалити'>
                    
        </form> 
<div class="clients">
    <span>ID</span> <span>Ім'я</span> <span>Призвіще</span> <span>По-батькові</span> <span>Номер телефону</span>
    <div class="row space">

        <div class="col-md-1">
            <div class="order_number">
                <?php
                for ($i=0; $i < R::count('client'); $i++){
                    if($id_c[$i]!="")
                        echo "$id_c[$i]<br/><br/>";

                }
                ?>
            </div>
        </div>
        <div class="col-md-2">
            <div class="order_type">
                <?php
                for ($i=0; $i < R::count('client'); $i++){
                    if($name_c[$i]!="")
                        echo "$name_c[$i]<br/><br/>";
                }
                ?>
            </div>
        </div>

        <div class="col-md-2 ">
            <div class="order-city2">
                <?php
                for ($i=0; $i < R::count('client'); $i++){
                    if($surname_c[$i]!="")
                        echo "$surname_c[$i]<br/><br/>";
                }
                ?>
            </div>
        </div>
        <div class="col-md-2 ">
            <div class="order-mess">
                <?php
                for ($i=0; $i < R::count('client'); $i++)
                    if($patronymic_c[$i]!="")

                        echo "$patronymic_c[$i]<br/><br/>";

                ?>
            </div>
        </div>
        <div class="col-md-4">
            <div class="order-mess  phone_space ">
                <?php
                for ($i=0; $i < R::count('client'); $i++)
                    if($phone_c[$i]!="")
                        echo "$phone_c[$i]<br/><br/>";
                ?>
            </div>
        </div>
        
    </div>
</div>
</body>
</html>