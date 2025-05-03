<?php
$host = 'localhost';
$user = 'root';
$password = '';
$database = 'yoga';

$conn = mysqli_connect($host, $user, $password, $database);
if (!$conn) {
    echo 'tidak konek';
}
