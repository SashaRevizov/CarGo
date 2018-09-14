<?php 
require "php/connection.php";
$data = $_POST;
$order = R::findCollection('order', "ORDER BY 'id' DESC");
while ($orders = $order -> next()){
    $id[] = $orders -> id;
    $city1[] = $orders -> city_start;
    $city2[] = $orders -> city_end;
    $type[] = $orders -> type;
    $status[] = $orders -> status;
}

if (isset($data['del_order'])){
    $order = R::load('order', $data['id_order']);
      R::trash($order);
      header('Location:admin-orders.php');
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
    <link rel="stylesheet" href="style/css/style.css">
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
    <div class="users">
        <span>Замовлення</span>
    </div>
</a>
<div class="black-bar"></div>



        <form action="admin-orders.php" method="post" class="del">
            <span>Id замовлення для видалення</span>
            <input type="text" name = "id_order" class="del_id">
            <input class='dell'  name='del_order' type='submit' value='Видалити'>
                    
        </form> 
    
<div class="del-orders">   
    <span>ID</span> <span>Місто відправки</span> <span>Місто прибуття</span> <span>Тип вантажу</span> <span class="ss">Статус</span>
    <div class="row space">

    <div class="col-md-1 order_space">
        
            <?php
            for ($i=0; $i < R::count('order'); $i++){
                if($id[$i]!="")
                echo "<a class='change-order' href='admin-order-info.php?page=$id[$i]'>$id[$i]<br/><br/></a>";

            }
            ?>
        
    </div>
    <div class="col-md-2 order_space">
        
            <?php
            for ($i=0; $i < R::count('order'); $i++){
                if($city1[$i]!="")
                    echo "$city1[$i]<br/><br/>";
            }
            ?>
        
    </div>

    <div class="col-md-2 order_space">
      
            <?php
            for ($i=0; $i < R::count('order'); $i++){
                if($city2[$i]!="")
                    echo "$city2[$i]<br/><br/>";
            }
            ?>
       
    </div>
    <div class="col-md-2 order_space">
       
            <?php
            for ($i=0; $i < R::count('order'); $i++)
                if($type[$i]!="")

                    echo "$type[$i]<br/><br/>";

            ?>
       
    </div>
    <div class="col-md-2 order_space">
        
            <?php
            for ($i=0; $i < R::count('order'); $i++)
                if($status[$i]!="")
                    echo "$status[$i]<br/><br/>";
            ?>
        
    </div>

</div>
</div>



</body>
</html>