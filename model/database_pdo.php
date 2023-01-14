<?php
  $db_users = ["localhost:3306" => ["username" => "root", "passwd" => ""], "127.0.0.1:3306" => ["username" => "root", "passwd" => ""]];
  $db_host = 'localhost:3306';
  $db_name = "php_assignment4";
  $db_info = "mysql:host=$db_host;dbname=$db_name";
  $username = "";
  try {
    $db_conn = new PDO($db_info, $db_users[$db_host]['username'], $db_users[$db_host]['passwd']);
    $_SESSION['conn_status'] = "$db_name connected";  
  } catch (PDOException $e) {
    $_SESSION['conn_status'] = $e->getMessage();
  }
?>