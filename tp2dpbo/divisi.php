<?php

include("includes/DB.php");
include("includes/classDivisi.php");

$divisi = new Divisi();
$divisi->open();

// Menambah data divisi
if(isset($_POST['addDivisi'])){
    $divisi->add($_POST);
}

// Menghapus data Divisi
if (isset($_GET['id_hapus'])) {
    $id = $_GET['id_hapus'];

    $divisi->delete($id);
}

// Ambil data divisi
$result = $divisi->getDivisi();

if(!$result){
    die('Could not get data: ' . mysqli_error());
}

?>

<!-- HTML -->
<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Hello, world!</title>
  </head>

  <body>

    <!-- Navbar -->
    <section id="navbar">
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container-fluid">
                <a class="navbar-brand" href="index.php">
                    <img src="images/SPQR.png" width="30" height="24">
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                        <a class="nav-link" href="index.php">Home</a>
                        </li>
                        <li class="nav-item">
                        <a class="nav-link" href="tambahPengurus.php">Tambah Pengurus</a>
                        </li>
                        <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="divisi.php">Divisi</a>
                        </li>
                        <li class="nav-item">
                        <a class="nav-link" href="bidangDivisi.php">Bidang Divisi</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </section>

    <!-- Form Tambah Data Divisi -->
    <section id="form-divisi">
        <div class="container my-5">
        <h2 class="text-center pt-3">Input Divisi</h2>
            <form action="divisi.php" method="POST">
            <div class="form-row mb-3">
                <div class="form-group col">
                <label for="namaDivisi">Nama Divisi</label>
                <input type="text" class="form-control" name="namaDivisi" required />
                </div>
            </div>

            <button type="submit" name="addDivisi" class="btn btn-dark mt-3">Tambah Divisi</button>
            </form>
        </div>
    </section>

    <!-- Tabel Divisi -->
    <section id="tabel-divisi">
    <?php

    echo "<div class='container my-5'>";
    echo "<p><h2 class='text-center'>Tabel Divisi</h2></p>";
    echo "<table class='table'>
            <thead>
            <tr>
                <td>No</td>
                <td>ID Divisi</td>
                <td>Nama Divisi</td>
                <td>Action</td>
            </tr>
            </thead>";

    $i = 1;
    while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
        echo "<tr>";
        echo "<td> $i </td>";
        echo "<td> {$row['id_divisi']} </td>";
        echo "<td> {$row['nama_divisi']} </td>";
        echo "<td>
              <a href='divisi.php?id_edit={$row['id_divisi']}' class='btn btn-warning''>Edit</a>
              <a href='divisi.php?id_hapus={$row['id_divisi']}' class='btn btn-danger''>Hapus</a>
              </td>";
        echo "</tr>";
        $i++;
    }
    echo "</table>";
    echo "</div>";
    $divisi->close();

    ?>
    </section>

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

  </body>
</html>