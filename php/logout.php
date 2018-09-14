<?php
require "rb-mysql.php";
R::setup( 'mysql:host=localhost;dbname=CarGoNew',
    'root', '4ass55rf' );
session_start();

unset($_SESSION['logged_name']);
unset($_SESSION['logged_surname']);
unset($_SESSION['logged_patronymic']);
unset($_SESSION['logged_phone']);

header('Location: ../index.php');
?>