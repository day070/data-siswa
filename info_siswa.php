<?php
include("conection.php");
$nisn = $_GET['nisn'];

$data = mysqli_query($con, "SELECT * FROM tbl_siswa WHERE nisn=$nisn");

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
    <?php echo $nama ?>
</body>

</html>