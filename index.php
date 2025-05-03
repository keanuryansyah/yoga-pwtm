<?php
require('db.php');
require('selectdata.php');

$rowsData = selectData("SELECT * FROM mhs");

if (isset($_GET['remove'])) {
    $nim = $_GET['remove'];
    mysqli_query($conn, "DELETE FROM mhs WHERE nim = '$nim' ");
    header('Location: index.php');
    exit;
}


?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="nama-wr">
        <h2>Nama: Farnanda Yoga Saputra</h2>
        <h3>Nim: 2311501270</h3>
        <h4>Matkul: Pemrograman Web tingkat Mahir</h4>
    </div>
    <div id="form-wrapper">
        <div id="form-content-col1" class="fc">
            <div id="form-1" class="form">
                <form action="masukan.php" method="post">
                    <h2>Tambahkan data</h2>
                    <div class="fm-row1 fm-row">
                        <label for="nama" name="nama">Nama:</label>
                        <input type="text" id="nama" name="nama" required>
                    </div>
                    <div class="fm-row2 fm-row">
                        <label for="nim" name="nim">Nim:</label>
                        <input type="text" id="nim" name="nim" required>
                    </div>
                    <div class="fm-row3 fm-row">
                        <label for="prodi" name="prodi">Prodi:</label>
                        <input type="text" id="prodi" name="prodi" required>
                    </div>
                    <div class="fm-row4 fm-row">
                        <label for="alamat" name="alamat">Alamat:</label>
                        <textarea name="alamat" id="alamat" required></textarea>
                    </div>
                    <button type="submit" name="submit">Submit</button>
                </form>
            </div>

        </div>
        <div id="form-content-col2" class="fc">
            <div class="table-wrapper">
                <table border="1" cellpadding="10" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Nama</th>
                            <th>NIM</th>
                            <th>Prodi</th>
                            <th>Alamat</th>
                            <th>Tombol Hapus</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- kalo data tidak di temukan -->
                        <?php
                        if (!$rowsData) {
                            echo '<tr><td colspan="5" style="text-align:center;">Tidak ada data.</td></tr>';
                        } else {
                            foreach ($rowsData as $rowData) {
                        ?>
                                <tr>

                                    <td><?php echo $rowData['nama']; ?></td>
                                    <td><?php echo $rowData['nim']; ?></td>
                                    <td><?php echo $rowData['prodi']; ?></td>
                                    <td><?php echo $rowData['alamat'] ?></td>

                                    <td>
                                        <a href="index.php?remove=<?php echo $rowData['nim']; ?>" class="tombol-hapus" onclick="return confirm('Yakin ingin hapus?')">Hapus</a>
                                    </td>
                                </tr>
                        <?php

                            }
                        }

                        ?>
                    </tbody>
                </table>
            </div>
            <div id="form-2" class="form">
                <form action="edit.php" method="post">
                    <h2>Edit data</h2>
                    <div class="fm-row2 fm-row">
                        <label for="nim-edited" name="nim-edited">Nim:</label>
                        <input type="text" id="nim-edited" name="nim-edited" required>
                        <?php
                        if (isset($_GET['nodata'])) {
                            echo '<p class="nodata">Nim tidak ditemukan.</p>';
                        }

                        ?>
                    </div>
                    <div class="fm-row1 fm-row">
                        <label for="nama-edited" name="nama-edited">Nama:</label>
                        <input type="text" id="nama-edited" name="nama-edited">
                    </div>
                    <div class="fm-row3 fm-row">
                        <label for="prodi-edited" name="prodi-edited">Prodi:</label>
                        <input type="text" id="prodi-edited" name="prodi-edited">
                    </div>
                    <div class="fm-row4 fm-row">
                        <label for="alamat-edited" name="alamat-edited">Alamat:</label>
                        <textarea name="alamat-edited" id="alamat-edited"></textarea>
                    </div>
                    <button type="submit" name="submit-edited">Submit</button>
                </form>
            </div>

        </div>
    </div>
</body>

</html>