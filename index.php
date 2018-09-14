
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>CarGo</title>
  <link rel="stylesheet" href="style/css/reset.css">
  <link rel="stylesheet" href="style/css/bootstrap.css">
  <link rel="stylesheet" href="style/css/style.css">
    <link rel="stylesheet" href="style/css/load.css">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">

</head>
<body>
    <div id="cssload-wrapper">
        <div class="cssload-loader">
            <div class="cssload-line"></div>
            <div class="cssload-line"></div>
            <div class="cssload-line"></div>
            <div class="cssload-line"></div>
            <div class="cssload-line"></div>
            <div class="cssload-line"></div>
            <div class="cssload-subline"></div>
            <div class="cssload-subline"></div>
            <div class="cssload-subline"></div>
            <div class="cssload-subline"></div>
            <div class="cssload-subline"></div>
            <div class="cssload-loader-circle-1"><div class="cssload-loader-circle-2"></div></div>
            <div class="cssload-needle"></div>
            <div class="cssload-loading">loading</div>
        </div>
    </div>
  <div class="bg">
    <?php include ("header.php"); ?>
    <div class="container">
      <div class="row">
        <div class="col-md-8">
          <div class="main-info">
            <span class="red-line"></span>
            <p class="sub">Допомога у відправленні вантажу
                та отриманні нових замовлень на перевезення </p>
          </div>
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
    <script>
        $(window).on('load', function () {
            $preloader = $('#cssload-wrapper'),
                $loader = $preloader.find('.cssload-loader');
            $loader.delay(3000).fadeOut();
            $preloader.delay(3000).fadeOut('slow');
        });
    </script>
</body>
</html>
