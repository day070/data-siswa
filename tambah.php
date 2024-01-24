<?php
include("conection.php");

function generateRandomString($length = 10)
{
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}
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
                <td><input type="file" name="file"></td>
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
        $nama_file = $target_dir . basename($_FILES["file"]["name"]);
        $target_file = $target_dir . $nama_file;
        $tipe_file = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
        $imgSize = $_FILES['file']['size'];
        $randomName = generateRandomString(10);
        $newName = $randomName . "." . $tipe_file;

        if ($nama == '' || $jurusan == '') {
            echo "Nama dan Jurusan wajib di isi";
        }
        if ($nama_file != '') {
            $maxSize = 1000000;
            if ($imgSize > $maxSize) {
                echo "file tidak boleh lebih dari 1MB";
            } else {
                if ($tipe_file != 'jpg' && $tipe_file != 'png' && $tipe_file != 'gif' && $tipe_file != 'jpeg') {
                    ?>
                    <div class="alert alert-danger mt-3" role="alert">
                        Tipe file tidak diperbolehkan
                    </div>
                    <?php
                } else {
                    move_uploaded_file($_FILES["file"]["tmp_name"], $target_dir . $newName);

                }
            }
        }


        $queryTambah = mysqli_query($con, "INSERT INTO tbl_siswa(nama,jurusan,alamat,foto)VALUES('$nama','$jurusan','$alamat', '$newName')");

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