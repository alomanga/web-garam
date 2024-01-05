<?php
session_start();

if( !isset($_SESSION["login"])) {
    header("Location: login.php");
    exit;
}


require 'functions.php';

//ambil data di url
$id = $_GET["id"];

//query data mahasiswa berdasarkan id
$brt = query("SELECT * FROM galeri WHERE id = $id")[0];

//cek apakah tombol submit sudah ditekan atau belum
if(isset($_POST["submit"])){

    //cek apakah data berhasil diubah atau tidak
    if( ubahGaleri($_POST)>0){
        echo "
            <script>
                alert('data berhasil diubah!');
                document.location.href = 'galeri.php';
            </script>
        ";
    } else {
        echo "
            <script>
                alert('data gagal diubah!');
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
    <title>Admin</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }

        h1 {
            text-align: center;
            color: #333;
        }

        form {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        ul {
            list-style: none;
            padding: 0;
        }

        li {
            margin-bottom: 15px;
        }

        label {
            display: block;
            margin-bottom: 5px;
        }

        input[type="radio"] {
            margin-right: 5px;
        }

        img {
            display: block;
            margin-bottom: 10px;
        }

        input[type="file"] {
            margin-top: 5px;
        }

        button {
            background-color: #4caf50;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        button:hover {
            background-color: #45a049;
        }

        input[type="radio"] {
            display: inline-block;
            margin-right: 5px;
        }

        label {
            display: inline-block;
            margin-right: 15px;
        }
    </style>
</head>
<body>
    <form action="" method="post" enctype="multipart/form-data"> <!-- digunakan post agar saat datanya ditambahkan tidak kelihatan di url -->
        <input type="hidden" name="id" value="<?= $brt["id"]; ?>">
        <input type="hidden" name="gambarLama" value="<?= $brt["picture"]; ?>">
        <h1>Ubah Galeri</h1>
        <ul>
            <li>
                <label>Kategori:</label>
                <br>
                
                <input type="radio" name="kategori" id="pabrik" value="Pabrik">
                <label for="pabrik">Pabrik </label>
                
                <input type="radio" name="kategori" id="produk" value="Produk">
                <label for="produk">Produk </label>
                
                <input type="radio" name="kategori" id="tambak" value="Tambak">
                <label for="tambak">Tambak </label>
            </li>
            <li>
                <label for="gambar">Gambar: </label>
                <img src="img/<?= $brt['picture']; ?>" width="70">
                <input type="file" name="gambar" id="gambar">
            </li>
            <li>
                <button type="submit" name="submit">Tambah Gambar!</button>
            </li>
        </ul>


    </form>
</body>
</html>