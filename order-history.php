<?php
require "php/connection.php";

$orders = R::findCollection('order', "ORDER BY 'date_start' DESC");
while ($order = $orders -> next()){
    if($order -> phone_start == $_SESSION['logged_phone']) {
        if  ($order -> status != 'Завершено'){
            $id[] = $order->id;
            $type[] = $order->type;
            $city1[] = $order->city_start;
            $city2[] = $order->city_end;
            if ($order->transporter_phone == NULL) {
                $transporter[] = "-";
            } elseif ($order->status == "В процесі") {
                $transporter[] = "Завершити";
            } else {
                $transporter[] = "Перевізник знайден";
            }
        }
        else {
            $id2[] = $order->id;
            $type2[] = $order->type;
            $city1_2[] = $order->city_start;
            $city2_2[] = $order->city_end;
        }
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
            <div class="col-md-12">
                <div class="history-active">
                    <span>Номер</span> <span>Тип груза</span> <span class="kast">Місто прибуття</span><br>
                    <div class="row">
                        <div class="col-md-2">
                            <div class="order_number">
                                <?php
                                for ($i=0; $i < R::count('order'); $i++){
                                    if($id[$i]!="")
                                        echo "<a class='change-order' href='client-order-info.php?page=$id[$i]'>$id[$i]<br/><br/></a>";

                                }
                                ?>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="order_type">
                                <?php
                                for ($i=0; $i < R::count('order'); $i++){
                                    if($id[$i]!="")
                                    echo "$type[$i]<br/><br/>";
                                }
                                ?>
                            </div>
                        </div>

                        <div class="col-md-2 ">
                            <div class="order-city2">
                                <?php
                                for ($i=0; $i < R::count('order'); $i++){
                                    if($id[$i]!="")
                                    echo "$city2[$i]<br/><br/>";
                                }
                                ?>
                            </div>
                        </div>
                        <div class="col-md-4 offset-md-1">
                            <div class="order-mess">
                                <?php
                                for ($i=0; $i < R::count('order'); $i++){
                                    if($id[$i]!="")
                                if ($transporter[$i] != "-") {
                                    echo "<a class='change-order' href='client-order-accept.php?page=$id[$i]'>$transporter[$i]<br/><br/></a>";
                                } else { echo $transporter[$i];}
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="history">
                    <div class="row">
                        <span>Номер</span> <span>Тип груза</span><span>Місто відправки</span> <span class="kast">Місто прибуття</span><br>
                        <div class="col-md-2">
                            <div class="order_number">
                                <?php
                                for ($i=0; $i < R::count('order'); $i++){
                                    if($id2[$i]!="")
                                    echo "<a class='change-order' href='client-order-info.php?page=$id2[$i]'>$id2[$i]<br/><br/></a>";

                                }
                                ?>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="order_type">
                                <?php

                                for ($i=0; $i < R::count('order'); $i++){
                                    if($id2[$i]!="")
                                    echo "$type2[$i]<br/><br/>";
                                }
                                ?>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="order_city">
                                <?php
                                for ($i=0; $i < R::count('order'); $i++){
                                    if($id2[$i]!="")
                                    echo "$city1_2[$i]<br/><br/>";
                                }
                                ?>
                            </div>
                        </div>
                        <div class="col-md-2 offset-md-1">
                            <div class="order-city2">
                                <?php
                                for ($i=0; $i < R::count('order'); $i++){
                                    if($id2[$i]!="")
                                    echo "$city2_2[$i]<br/><br/>";
                                }
                                ?>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>