<?php
session_start();

if (!isset($_SESSION["login"])) {
    header("Location: login.php");
    exit;
}


require 'functions.php';

//ambil data di url
$id = $_GET["id"];

//query data mahasiswa berdasarkan id
$brt = query("SELECT * FROM news WHERE id = $id")[0];

//cek apakah tombol submit sudah ditekan atau belum
if (isset($_POST["submit"])) {

    //cek apakah data berhasil diubah atau tidak
    if (ubah($_POST) > 0) {
        echo "
            <script>
                alert('data berhasil diubah!');
                document.location.href = 'news.php';
            </script>
        ";
    } else {
        echo "
            <script>
                alert('data gagal diubah!');
                document.location.href = 'news.php';
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
    <title>Ubah Data Mahasiswa</title>

    <link rel="stylesheet" href="css/responsives.css">
    <script src="ckeditor5/ckeditor.js"></script>
</head>

<body>
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
            height: auto;
        }

        h1 {
            text-align: center;
            color: #333;
        }

        form {
            background-color: #fff;
            border-radius: 8px;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 1000px;
            overflow: auto;
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
            margin-bottom: 8px;
        }

        input[type="date"],
        input[type="text"],
        input[type="file"] {
            width: 100%;
            padding: 8px;
            box-sizing: border-box;
        }

        img {
            display: block;
            margin-bottom: 10px;
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

    <form action="" method="post" enctype="multipart/form-data"> <!-- digunakan post agar saat datanya ditambahkan tidak kelihatan di url -->
        <h1>Ubah Berita</h1>
        <input type="hidden" name="id" value="<?= $brt["id"]; ?>">
        <input type="hidden" name="gambarLama" value="<?= $brt["gambar"]; ?>">
        <ul>
            <li>
                <label for="tanggal">Tanggal: </label>
                <input type="date" name="tanggal" id="tanggal" required value="<?= $brt["tanggal"]; ?>">
            </li>
            <li>
                <label for="gambar">Gambar: </label>
                <img src="img/<?= $brt['gambar']; ?>" width="70">
                <input type="file" name="gambar" id="gambar">
            </li>
            <li>
                <label for="nama">Judul: </label>
                <input type="text" name="nama" id="nama" required value="<?= $brt["nama"]; ?>">
            </li>
            <li>
                <label for="deskripsi">Deskripsi: </label>
                <textarea name="deskripsi" id="deskripsi" required><?= htmlspecialchars_decode($brt["deskripsi"]); ?></textarea>
                <!-- <input type="text" name="deskripsi" id="deskripsi" required value="<?= $brt["deskripsi"]; ?>"> -->
            </li>
            <li>
                <button type="submit" name="submit">Ubah Data!</button>
            </li>
        </ul>

        <script>
            ClassicEditor
                .create(document.querySelector('#deskripsi'))
                .catch(error => {
                    console.error(error);
                });
        </script>
    </form>
</body>

</html>