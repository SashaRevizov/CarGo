<?php
require "php/connection.php";
$order = R::load('order', $_GET['page']);
$transporters = R::findCollection('transporter', "ORDER BY 'id' DESC");
while ($transporter = $transporters -> next()) {
    if($transporter -> transporter_phone == $order -> transporter_phone) {
        $name = $transporter->transporter_name;
        $surname = $transporter->transporter_surname;
        $phone = $transporter->transporter_phone;
        $patronimic = $transporter->transporter_patronymic;
        }
    }

$data = $_POST;
if (isset($data['do_accept'])){
    $order -> status = "В процесі";
    R::store($order);
    header('Location:order-history.php');
}
if (isset($data['do_back'])){
    $order -> transporter_phone = null;
    $order -> status = "Активний";
    R::store($order);
    header('Location:order-history.php');
}
if (isset($data['do_end'])){
    $order -> status = "Завершено";
    $order -> date_end = date("Y.m.d");;
    R::store($order);
    header('Location:order-history.php');
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
<div class="bg">
    <?php include ("client-header.php"); ?>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-11">
                <div class="order-accept">

                    <div class="info-number">
                        <div class="row">
                            <div class="col-md-5">
                                <Span>Ім'я перевізника:</Span>
                            </div>
                            <div class="col-md-5 offset-md-1">
                                <?php
                                    echo $name;
                                ?>
                            </div>
                        </div>
                    </div>
                    <div class="info-number">
                        <div class="row">
                            <div class="col-md-5">
                                <Span>По-батькові:</Span>
                            </div>
                            <div class="col-md-5 offset-md-1">
                                <?php
                                echo $patronimic;
                                ?>
                            </div>
                        </div>
                    </div>
                    <div class="info-number">
                        <div class="row">
                            <div class="col-md-5">
                                <Span>Призвіще перевізника:</Span>
                            </div>
                            <div class="col-md-5 offset-md-1">
                                <?php echo $surname;?>
                            </div>
                        </div>
                    </div>
                    <div class="info-number">
                        <div class="row">
                            <div class="col-md-5">
                                <Span>Номер телефона:</Span>
                            </div>
                            <div class="col-md-5 offset-md-1">
                                <?php echo $phone;?>
                            </div>
                        </div>
                    </div>
                    <form action="client-order-accept.php?page=<?php echo $_GET['page'];?>" method="post">
                        <?php
                        if ($order->status == "Підтвердження"){
                            echo "<button class=\"butt-ac\" type=\"submit\" name=\"do_accept\">Прийняти</button>";
                            echo "<button class=\"butt-back\" type=\"submit\" name=\"do_back\">Відмовити</button>";
                        } elseif ($order->status == "В процесі"){
                            echo "<button class=\"butt-accept\" type=\"submit\" name=\"do_end\">Завершити</button>";
                        }
                        ?>


                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>