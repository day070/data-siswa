<?php
require("conection.php");
$data = mysqli_query($con, "SELECT * FROM tbl_siswa");
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<!-- Bosstrap Link -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
<link rel="stylesheet" href="css/style.css">

<body>
    <nav class="navbar navbar-expand-lg bg-body-tertiary navcuy">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Navbar</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">


                </ul>
                <form class="d-flex" role="search">
                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success" type="submit">Search</button>
                </form>
            </div>
        </div>

    </nav>

    <div class="d-flex flex-column flex-shrink-0 p-3 bg-light sidebar" style="width: 240px;height:100vh;">
        <ul class="nav nav-pills flex-column mb-auto mt-5">
            <li>
                <a href="#" class="nav-link link-dark">
                    <svg class="bi me-2" width="16" height="16">
                        <use xlink:href="#home"></use>
                    </svg>
                    Home
                </a>
            </li>
            <li>
                <a href="#" class="nav-link link-dark">
                    <svg class="bi me-2" width="16" height="16">
                        <use xlink:href="#speedometer2"></use>
                    </svg>
                    Dashboard
                </a>
            </li>
            <li>
                <a href="tambah.php" class="nav-link link-dark">
                    <svg class="bi me-2" width="16" height="16">
                        <use xlink:href="#table"></use>
                    </svg>
                    Tambah Data
                </a>
            </li>
            <li>
                <a href="#" class="nav-link link-dark">
                    <svg class="bi me-2" width="16" height="16">
                        <use xlink:href="#grid"></use>
                    </svg>
                    Products
                </a>
            </li>
            <li>
                <a href="#" class="nav-link link-dark">
                    <svg class="bi me-2" width="16" height="16">
                        <use xlink:href="#people-circle"></use>
                    </svg>
                    Customers
                </a>
            </li>
        </ul>
        <hr>
        <div class="dropdown">
            <a href="#" class="d-flex align-items-center link-dark text-decoration-none dropdown-toggle"
                id="dropdownUser2" data-bs-toggle="dropdown" aria-expanded="false">
                <img src="https://github.com/mdo.png" alt="" width="32" height="32" class="rounded-circle me-2">
                <strong>mdo</strong>
            </a>
            <ul class="dropdown-menu text-small shadow" aria-labelledby="dropdownUser2" style="">
                <li><a class="dropdown-item" href="#">New project...</a></li>
                <li><a class="dropdown-item" href="#">Settings</a></li>
                <li><a class="dropdown-item" href="#">Profile</a></li>
                <li>
                    <hr class="dropdown-divider">
                </li>
                <li><a class="dropdown-item" href="#">Sign out</a></li>
            </ul>
        </div>
    </div>
    <div class="cuycuy">
        <div class="bgkk">
            <h3>Data Siswa</h3>
        </div>
        <div class="bungkus-kar">
            <?php
            while ($siswa = mysqli_fetch_array($data)) {

                ?>

                <div class="card" style="width: 18rem;margin:20px;">
                    <img src="aurel.jpg" class="card-img-top" style="height:250px;">
                    <div class="card-body">
                        <h5 class="card-title">
                            <?php echo $siswa['nama'] ?>
                        </h5>
                        <h5 class="card-title">
                            <?php echo $siswa['jurusan'] ?>
                        </h5>

                        <p class="card-text">
                            <?php echo $siswa['alamat'] ?>
                        </p>
                        <?php echo "<a class='btn btn-primary' href='info_siswa.php?nisn=$siswa[nisn]'>Lihat Detail..</a>" ?>
                        <br>
                        <?php
                        ?>
                        <div class="mt-2">
                            <?php
                            echo "<a class='btn btn-danger m-1' href='delete.php?nisn=$siswa[nisn]'>Hapus</a>";
                            echo "<a class='btn btn-warning' href='edit.php?nisn=$siswa[nisn]'> Edit</a>";
                            ?>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>





    <!-- Bootstrap Link -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>
</body>



</html>