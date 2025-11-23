<?php

$host = 'localhost';
$db = 'be26_exam5_animal_adoption_verenagerbasich'; 
$user = 'root'; 
$pass = '';

$conn = mysqli_connect($host, $user, $pass, $db);

if (!$conn) {
    die("Failed to connect to the database: " . mysqli_connect_error());
}

