<?php
session_start();

if (!isset($_SESSION["login"])) {
    header("Location: login.php");
    exit;
}


require 'functions.php';
if (isset($_POST["submit"])) {
    //cek apakah data berhasil ditambahkan atau tidak
    if (tambahGalery($_POST) > 0) {
        echo "
            <script>
                alert('data berhasil ditambahkan!');
                document.location.href = 'galeri.php';
            </script>
        ";
    } else {
        echo "
            <script>
                alert('data gagal ditambahkan!');
                document.location.href = 'galeri.php';
            </script>
        ";
    }
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Galeri</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
        }

        form {
            background-color: #fff;
            border-radius: 8px;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h1 {
            text-align: center;
            color: #333;
        }

        label {
            display: inline-block;
            margin-bottom: 8px;
            margin-right: 15px; /* Added margin for spacing between radio buttons */
        }

        input[type="radio"],
        input[type="file"] {
            margin-bottom: 16px;
        }

        button {
            background-color: #4caf50;
            color: #fff;
            padding: 10px 15px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        button:hover {
            background-color: #45a049;
        }
    </style>
</head>

<body>
    <form action="" method="post" enctype="multipart/form-data"> <!-- digunakan post agar saat datanya ditambahkan tidak kelihatan di url -->
        <h1>Tambah Galeri</h1>

        <label>Kategori:</label>

        <input type="radio" name="kategori" id="pabrik" value="Pabrik">
        <label for="pabrik">Pabrik </label>

        <input type="radio" name="kategori" id="produk" value="Produk">
        <label for="produk">Produk </label>

        <input type="radio" name="kategori" id="tambak" value="Tambak">
        <label for="tambak">Tambak </label>

        <br>

        <label for="gambar">Gambar (jpg, jpeg, png, maksimum 3MB): </label>
        <input type="file" name="gambar" id="gambar">
        
        <br>
        
        <button type="submit" name="submit">Tambah Gambar!</button>
    </form>
</body>

</html>