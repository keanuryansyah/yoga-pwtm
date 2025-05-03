<?php
require('db.php');
if (isset($_POST['submit'])) {
    global $conn;
    $nama = $_POST['nama'];
    $nim = $_POST['nim'];
    $prodi = $_POST['prodi'];
    $alamat = $_POST['alamat'];

    mysqli_query($conn, "INSERT INTO mhs (nim, nama, prodi, alamat) VALUES ('$nim', '$nama', '$prodi', '$alamat')");

    header('Location: index.php');
    exit;
}
