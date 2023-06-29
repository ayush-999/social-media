<?php

$hostDetails = 'mysql:host=localhost; dbname=social; charset=utf8mb4';
$userAdmin = 'root';
$pass = '';

$localhost = "http://localhost/social-media/";

try {
  $pdo = new PDO($hostDetails, $userAdmin, $pass);
} catch (PDOException $e) {
  echo 'Connection error!' . $e->getMessage();
}