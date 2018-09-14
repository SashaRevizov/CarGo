<?php
require "/php/connection.php";

$data=$_POST;
if (isset($data['do_order'])){
    if (trim($data['city1']) == '' ) {
        $errors[] = 'Введіть місто відправлення ';
    }
    if (trim($data['city2']) == '' ) {
        $errors[] = 'Введіть місто прибуття   ';
    }
    if (trim($data['adress1']) == '' ) {
        $errors[] = 'Введіть адресу відправлення   ';
    }
    if (trim($data['adress2']) == '' ) {
        $errors[] = 'Введіть адресу доставки   ';
    }
    if (trim($data['phone1']) == '' ) {
        $errors[] = 'Введіть телефон відправника   ';
    }
    if (trim($data['phone2']) == '' ) {
        $errors[] = 'Введіть телефон отримувача   ';
    }
    if (trim($data['name1']) == '' ) {
        $errors[] = "Введіть ім'я відправника ";
    }
    if (trim($data['name2']) == '' ) {
        $errors[] = 'Введіть ім\'я отримувача   ';
    }
    if (trim($data['type']) == '' ) {
        $errors[] = 'Введіть дані про замовлення   ';
    }
    if (trim($data['length']) == '' ) {
        $errors[] = 'Введіть габарити замовлення ';
    }
    if (trim($data['width']) == '' ) {
        $errors[] = 'Введіть габарити замовлення ';
    }
    if (trim($data['height']) == '' ) {
        $errors[] = 'Введіть габарити замовлення  ';
    }
    if (trim($data['weight']) == '' ) {
        $errors[] = 'Введіть габарити замовлення ';
    }
    if (trim($data['date1']) == '' ) {
        $errors[] = 'Введіть дату відправки  ';
    }
    if (trim($data['date2']) == '' ) {
        $errors[] = 'Введіть дату доставки   ';
    }
    if (trim($data['date2']) < trim($data['date1'])) {
        $errors[] = 'Невірна дата доставки  ';
    }

    if (empty($errors)){
        $order = R::dispense('order');
        $order -> city_start = $data['city1'];
        $order -> city_end = $data['city2'];
        $order -> adress_start = $data['adress1'];
        $order -> adress_end = $data['adress2'];
        $order -> name_start = $data['name1'];
        $order -> name_end = $data['name2'];
        $order -> phone_start = $data['phone1'];
        $order -> phone_end = $data['phone2'];
        $order -> type = $data['type'];
        $order -> length = $data['length'];
        $order -> width = $data['width'];
        $order -> height = $data['height'];
        $order -> weight = $data['weight'];
        $order -> date_start = $data['date1'];
        $order -> date_end = $data['date2'];
        $order -> status = 'Активний';
        $order ->transporter_phone = NULL;
        R::store($order);
    }
}



if (isset($_SESSION['logged_name'])){
} else {header('Location: ../index.php');}
?>
<!DOCTYPE html>
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
    <form action="client-order.php" method="post">
    <div class="container">
        <div class="row justify-content-center">
        <div class="col-md-11">

            <div class="order-adress">

                <span>Маршрут</span>
                <div class="order-input">
                    <img src="img/Input.png" alt="input">
                    <input required class="or-input" maxlength="29" name="city1" type="text" placeholder="Населений пункт" >
                    <input required class="or-input" maxlength="50" name="adress1" type="text" placeholder="Адреса">
                    <input required class="or-input" maxlength="30" name="name1" type="text" placeholder="Контактне лице" value="<?php echo $_SESSION['logged_name']; ?>">
                    <input required class="or-input"  name="phone1" type="text" placeholder="Номер телефону" value="<?php echo $_SESSION['logged_phone']; ?>" readonly>
                </div>
                <div class="order-output">
                    <img src="img/Output.png" alt="output">
                    <input required class="or-input" maxlength="29" name="city2" placeholder="Населений пункт" type="text" >
                    <input required class="or-input" maxlength="50" name="adress2" placeholder="Адреса" type="text">
                    <input required class="or-input" maxlength="30" name="name2" placeholder="Контактне лице" type="text" >
                    <input required class="or-input" name="phone2" id="phone" placeholder="Номер телефону" type="text" >
                </div>
            </div>
        </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-11">
                <div class="order-info">
                    <span>Інформація про груз</span>
                    <div class="info">
                        <span>Тип</span>
                        <input required class="info-type" maxlength="20" name="type"  type="text">
                        <span>Габарити</span>
                        <input required class="info-set" name="length" maxlength="4" placeholder="Довжина" type="text">
                        <span>(м.)</span>
                        <input required class="info-set" name="width" maxlength="4" placeholder="Ширина" type="text">
                        <span>(м.)</span>
                        <input required class="info-set" name="height" maxlength="4" placeholder="Висота" type="text">
                        <span>(м.)</span>
                    </div>
                    <div class="info">
                        <span>Вага</span>
                        <input required class="info-setting" name="weight"  maxlength="4" type="text">
                        <span>(кг.)</span>
                        <span>Дата з:</span>
                        <input required class="info-setting" name="date1" type="date">
                        <span>по:</span>
                        <input required class="info-setting" name="date2" type="date">
                    </div>
                    <div class="error">
                        <?php
                        if (!empty($errors))
                            echo array_shift($errors);
                        ?>
                    </div>
                    <button  class="butt-order" type="submit" name="do_order">Розмістити</button>
                </div>

            </div>

        </div>
        </form>
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
