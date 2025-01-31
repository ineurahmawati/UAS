<?php

    $mysqli = new mysqli('localhost', 'root', '', 'uas');

    $sql = $mysqli->query("SELECT * FROM beasiswa");
    
    if (isset($_POST['nim_mahasiswa'])) {
        $nim_mahasiswa = $_POST['nim_mahasiswa'];
        $jenis_beasiswa = $_POST['jenis_beasiswa'];
        $tanggal_mulai = $_POST['tanggal_mulai'];
        $tanggal_selesai = $_POST['tanggal_selesai'];
       

        $insert = $mysqli->query("INSERT INTO beasiswa(nim_mahasiswa, jenis_beasiswa, tanggal_mulai, tanggal_selesai) 
                                            VALUES ('$nim_mahasiswa', '$jenis_beasiswa', '$tanggal_mulai', '$tanggal_selesai')");
        if ($insert) {
            header("Location: index.php");
            exit();
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Tambah Prestasi Mahasiswa</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    
</head>
<body>
    <div class="container">
    <h1 class="text-center">Tambah Beasiswa Mahasiswa</h1>
    <form method="POST">
        <div class="mb-3">
            <label for="nim_mahasiswa" class="form-label">Nim Mahasiswa</label>
            <input type="text" class="form-control" id="nim_mahasiswa" name="nim_mahasiswa">
        </div>
        <div class="mb-3">
            <label for="jenis_beasiswa" class="form-label">Jenis Beasiswa</label>
            <input type="text" class="form-control" id="jenis_beasiswa" name="jenis_beasiswa">
        </div>
        <div class="mb-3">
            <label for="tanggal_mulai" class="form-label">Tanggal Mulai</label>
            <input type="date" class="form-control" id="tanggal_mulai" name="tanggal_mulai">
        </div>
        <div class="mb-3">
            <label for="tanggal_selesai" class="form-label">Tanggal Selesai</label>
            <input type="date" class="form-control" id="tanggal_selesai" name="tanggal_selesai">
        </div>
        <div class="mt-3">
            <button type="submit" class="btn btn-primary">Submit</button>
            <a href="index.php" class="btn btn-warning">Cancel</a>
        </div>
    </form>
</body>
</html>