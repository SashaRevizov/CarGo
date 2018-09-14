
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

    <?php include ("header.php"); ?>
    <div class="container">
    <div class="client-start">
        <h1 class="client-h">
            Швидко знаходьте первізника <br> для вашого вантажу
        </h1>
        <a href="login-client.php" class="butt-accept left-p">Розмістити замовлення</a>
    </div>

    <div class="features-info">

        <div class="row">
            <div class="col-md-5 offset-md-1 features-1">
                <img src="/img/features-4.png"   width="80px"  height="80px"  alt="features">
                <sapn>Відправка вантажу у межах країни</sapn>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 offset-md-3 features-2">
                <img src="/img/features-5.png" width="100px"  height="80px" alt="features">
                <span>Розрахунок вартості перевезення</span>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 offset-md-1 features-3">
                <img src="/img/features-6.png" width="80px"  height="80px" alt="features">
                <span>Відстеження вантажу за допомогою мобільного додатку</span>
            </div>
        </div>
    </div>
    </div>
</div>


<div id="myModal" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header"><button class="close" type="button" data-dismiss="modal">×</button> </div>
            <div class="modal-body">
                <a href="login-client.php"><img src="img/client.png" alt="cleint" width="200" height="200"></a>
                <a href="login-transporter.php"><img src="img/transporter.png" alt="transporter" width="200" height="200"></a>
                <span>Відправник</span>
                <span>Перевізник</span>
            </div>

        </div>
    </div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="js/bootstrap.js"></script>
<script>
    $('#myModal').modal(options);



</script>
</body>
</html>
