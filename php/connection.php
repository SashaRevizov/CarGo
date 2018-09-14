<?php
require "/php/rb-mysql.php";



 R::setup( 'mysql:host=localhost;dbname=CarGoNew',
     'root', '4ass55rf' );
if (!R::testConnection())
    echo "Нет подключения к базе даних";
session_start();
?>
