<?php
include("conection.php");
$nisn = $_GET['nisn'];

$data = mysqli_query($con, "SELECT * FROM tbl_siswa WHERE nisn = $nisn");
while ($siswa = mysqli_fetch_array($data)) {
    $nama = $siswa['nama'];
    $jurusan = $siswa['jurusan'];
    $alamat = $siswa['alamat'];
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
    <form action="" method="post">

        <table>
            <tr>
                <td>Nama</td>
                <td><input type="text" name="nama" value=" <?php echo $nama ?>"></td>
            </tr>
            <tr>
                <td>Jurusan</td>
                <td><input type="text" name="jurusan" value=" <?php echo $jurusan ?>"></td>
            </tr>
            <tr>
                <td>Alamar</td>
                <td><input type="text" name="alamat" value="<?php echo $alamat ?>"></td>
            </tr>
            <tr>
                <td><input type="hidden" name="nisn" value="<?php echo $_GET['nisn'] ?>"></td>
                <td><input type="submit" name="update" class="edit" value="UPDATE"></td>
            </tr>
        </table>

    </form>

    <?php

    if (isset($_POST['update'])) {
        $nama = $_POST['nama'];
        $jurusan = $_POST['jurusan'];
        $alamat = $_POST['alamat'];

        $queryUpdate = mysqli_query($con, "UPDATE tbl_siswa SET nama= '$nama', jurusan= '$jurusan', alamat= '$alamat' WHERE nisn=$nisn ");

        if ($queryUpdate) {
            ?>
            <h1>Berhasil</h1>
            <meta http-equiv="refresh" content="2; url=index.php" />
            <?php
        } else {
            echo mysqli_error($con);
        }
    }


    ?>
</body>

</html>