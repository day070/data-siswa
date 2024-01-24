<?php
include("conection.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <button>Kembali</button>
    <form action="" method="post" enctype="multipart/form-data">
        <table>
            <tr>
                <td>Nama</td>
                <td><input type="text" name="nama" required></td>
            </tr>
            <tr>
                <td>Jurusan</td>
                <td><input type="text" name="jurusan" required></td>
            </tr>
            <tr>
                <td>Alamat</td>
                <td><input type="text" name="alamat" required></td>
            </tr>
            <tr>
                <td>Foto</td>
                <td><input type="file"></td>
            </tr>
            <tr>
                <td colspan="2"><input type="submit" name="submit" value="Tambah"></td>
            </tr>
        </table>
    </form>

    <?php
    if (isset($_POST['submit'])) {
        $nama = $_POST['nama'];
        $jurusan = $_POST['jurusan'];
        $alamat = $_POST['alamat'];

        $target_dir = "upload/";
        $target_file = $target_dir . basename($_FILES["file"]["name"]);

        $queryTambah = mysqli_query($con, "INSERT INTO tbl_siswa(nama,jurusan,alamat)VALUES('$nama','$jurusan','$alamat')");

        if ($queryTambah) {
            ?>
            <h1>Data Berhasil Di UPLOAD</h1>
            <?php
        } else {
            ?>

            <h1>Kesalahan</h1>
            <?php
        }
    }

    ?>
</body>

</html>