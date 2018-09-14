<?php
require "php/connection.php";
$data = $_POST;

$result = R::load('order', $_GET['page']);
$city1 = $result -> city_start;
$city2 = $result -> city_end;
$adress1 = $result -> adress_start;
$adress2 = $result -> adress_end;
$name1 = $result -> name_start;
$name2 = $result -> name_end;
$phone1 = $result -> phone_start;
$phone2 = $result -> phone_end;
$type = $result -> type;
$length = $result -> length;
$width = $result -> width;
$height = $result -> height;
$weight = $result -> weight;
$date1 = $result -> date_start;
$date2 = $result -> date_end;
$status = $result -> status;
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
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-11">
                <div class="order-information" >

                    <div class="info-number">
                        <div class="row">
                        <div class="col-md-5">
                            <Span>Номер замовлення:</Span>
                        </div>
                        <div class="col-md-5 offset-md-1">
                            <?php echo $_GET['page'];?>
                        </div>
                        </div>
                    </div>

                    <div class="info-number">
                        <div class="row">
                            <div class="col-md-5">
                                <Span>Місто відправлення:</Span>
                            </div>
                            <div class="col-md-5 offset-md-1">
                                <?php echo $city1;?>
                            </div>
                        </div>
                    </div>
                    <div class="info-number">
                        <div class="row">
                            <div class="col-md-5">
                                <Span>Місто прибуття:</Span>
                            </div>
                            <div class="col-md-5 offset-md-1">
                                <?php echo $city2;?>
                            </div>
                        </div>
                    </div>
                    <div class="info-number">
                        <div class="row">
                            <div class="col-md-5">
                                <Span>Адреса відправлення:</Span>
                            </div>
                            <div class="col-md-5 offset-md-1">
                                <?php echo $adress1;?>
                            </div>
                        </div>
                    </div>
                    <div class="info-number">
                        <div class="row">
                            <div class="col-md-5">
                                <Span>Адреса прибуття:</Span>
                            </div>
                            <div class="col-md-5 offset-md-1">
                                <?php echo $adress2;?>
                            </div>
                        </div>
                    </div>
                    <div class="info-number">
                        <div class="row">
                            <div class="col-md-5">
                                <Span>Дата погрузки:</Span>
                            </div>
                            <div class="col-md-5 offset-md-1">
                                <?php echo $date1;?>
                            </div>
                        </div>
                    </div>
                    <div class="info-number">
                        <div class="row">
                            <div class="col-md-5">
                                <Span>Дата доставки:</Span>
                            </div>
                            <div class="col-md-5 offset-md-1">
                                <?php echo $date2;?>
                            </div>
                        </div>
                    </div>
                    <div class="info-number">
                        <div class="row">
                            <div class="col-md-5">
                                <Span>Ім'я відправника:</Span>
                            </div>
                            <div class="col-md-5 offset-md-1">
                                <?php echo $name1;?>
                            </div>
                        </div>
                    </div>
                    <div class="info-number">
                        <div class="row">
                            <div class="col-md-5">
                                <Span>Ім'я отримувача:</Span>
                            </div>
                            <div class="col-md-5 offset-md-1">
                                <?php echo $name2;?>
                            </div>
                        </div>
                    </div>
                    <div class="info-number">
                        <div class="row">
                            <div class="col-md-5">
                                <Span>Номер відправника:</Span>
                            </div>
                            <div class="col-md-5 offset-md-1">
                                <?php echo $phone1;?>
                            </div>
                        </div>
                    </div>
                    <div class="info-number">
                        <div class="row">
                            <div class="col-md-5">
                                <Span>Номер отримувача:</Span>
                            </div>
                            <div class="col-md-5 offset-md-1">
                                <?php echo $phone2;?>
                            </div>
                        </div>
                    </div>
                    <div class="info-number">
                        <div class="row">
                            <div class="col-md-5">
                                <Span>Тип замовлення:</Span>
                            </div>
                            <div class="col-md-5 offset-md-1">
                                <?php echo $type;?>
                            </div>
                        </div>
                    </div>
                    <div class="info-number">
                        <div class="row">
                            <div class="col-md-5">
                                <Span>Довжина:</Span>
                            </div>
                            <div class="col-md-5 offset-md-1">
                                <?php echo $length;?>
                                <Span>(м.)</Span>
                            </div>
                        </div>
                    </div>
                    <div class="info-number">
                        <div class="row">
                            <div class="col-md-5">
                                <Span>Ширина:</Span>
                            </div>
                            <div class="col-md-5 offset-md-1">
                                <?php echo $width;?>
                                <Span>(м.)</Span>
                            </div>
                        </div>
                    </div>
                    <div class="info-number">
                        <div class="row">
                            <div class="col-md-5">
                                <Span>Висота:</Span>
                            </div>
                            <div class="col-md-5 offset-md-1">
                                <?php echo $height;?>
                                <Span>(м.)</Span>
                            </div>
                        </div>
                    </div>
                    <div class="info-number">
                        <div class="row">
                            <div class="col-md-5">
                                <Span>Маса:</Span>
                            </div>
                            <div class="col-md-5 offset-md-1">
                                <?php echo $weight;?>
                                <Span>(кг.)</Span>
                            </div>
                        </div>
                    </div>
                    <div class="info-number">
                        <div class="row">
                            <div class="col-md-5">
                                <Span>Статус:</Span>
                            </div>
                            <div class="col-md-5 offset-md-1">
                                <?php echo $status;?>
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