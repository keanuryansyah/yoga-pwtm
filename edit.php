<?php
require('db.php');
if (isset($_POST['submit-edited'])) {
    $nim = $_POST['nim-edited'];
    $nama = $_POST['nama-edited'];
    $prodi = $_POST['prodi-edited'];
    $alamat = $_POST['alamat-edited'];

    $nimChecking = mysqli_query($conn, "SELECT nim FROM mhs WHERE nim = '$nim' ");

    if (mysqli_num_rows($nimChecking)) {
        $dataRow = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM mhs WHERE nim = '$nim' "));

        if (strlen($nama) > 0) {
            $nama = $nama;
        } else {
            $nama = $dataRow['nama'];
        }

        if (strlen($prodi) > 0) {
            $prodi = $prodi;
        } else {
            $prodi = $dataRow['prodi'];
        }

        if (strlen($alamat) > 0) {
            $alamat = $alamat;
        } else {
            $alamat = $dataRow['alamat'];
        }

        mysqli_query($conn, "UPDATE mhs SET nama = '$nama', prodi = '$prodi', alamat = '$alamat' WHERE nim = '$nim' ");

        header('Location: index.php');
        exit;
    } else {
        header('Location: index.php?nodata');
    }
}
