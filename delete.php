<?php
require("conection.php");
$nisn = $_GET['nisn'];
$queryGetImage = mysqli_query($con, "SELECT foto FROM tbl_siswa WHERE nisn='$nisn'");
$imageData = mysqli_fetch_array($queryGetImage);
$imageName = $imageData['foto'];

// Hapus file gambar dari direktori "image"
$imagePath = "upload/$imageName";
if (file_exists($imagePath)) {
    unlink($imagePath);
}

$queryDelete = mysqli_query($con, "DELETE  FROM tbl_siswa WHERE nisn='$nisn'");
if ($queryDelete) {
    ?>
    Terhapus!
    </div>
    <meta http-equiv="refresh" content="2, url=index.php" />
    <?php
}

?>