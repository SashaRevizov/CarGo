
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
        <div class="row">
            <div class="col-md-7">
                <div class="about">
                <h1 class="h-logo">CarGo</h1>
                <p>
                    Ми допомагаємо вантажовідправникам швидко, якісно і без переплат доставити вантажі,
                    а перевізникам - отримувати замовлення на їх перевезення. </p>
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
