<?php
require_once "./configs/bootstrap.php";
require_once "./functions/functions.php";

// recuper id
$id = $_GET['id'];

deleteUser($connection,$id);

