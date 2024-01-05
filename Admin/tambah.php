<?php
session_start();

if (!isset($_SESSION["login"])) {
    header("Location: login.php");
    exit;
}


require 'functions.php';
if (isset($_POST["submit"])) {
    //cek apakah data berhasil ditambahkan atau tidak
    if (tambah($_POST) > 0) {
        echo "
            <script>
                alert('data berhasil ditambahkan!');
                document.location.href = 'news.php';
            </script>
        ";
    } else {
        echo "
            <script>
                alert('data gagal ditambahkan!');
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
    <title>Tambah Berita</title>

    <!-- Responsive CSS -->
    <link rel="stylesheet" href="css/responsives.css">
    <script src="ckeditor5/ckeditor.js"></script>

    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f5f5f5;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            height: auto;
        }

        form {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 1000px;
        }

        h1 {
            text-align: center;
            color: #333;
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
            color: #555;
        }

        input[type="date"],
        input[type="file"],
        input[type="text"] {
            width: 100%;
            padding: 8px;
            box-sizing: border-box;
        }

        textarea {
            width: 100%;
            padding: 8px;
            box-sizing: border-box;
            height: 150px;
        }

        button {
            background-color: #4caf50;
            color: #fff;
            padding: 10px 15px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            width: 100%;
        }

        button:hover {
            background-color: #45a049;
        }
    </style>
</head>

<body>
    <form action="" method="post" enctype="multipart/form-data"> <!-- digunakan post agar saat datanya ditambahkan tidak kelihatan di url -->
        <h1>Tambah Berita</h1>
        <ul>
            <li>
                <label for="tanggal">Tanggal: </label>
                <input type="date" name="tanggal" id="tanggal" required>
            </li>
            <li>
                <label for="gambar">Gambar (jpg, jpeg, png, maksimum 3MB): </label>
                <input type="file" name="gambar" id="gambar">
            </li>
            <li>
                <label for="nama">Judul: </label>
                <input type="text" name="nama" id="nama" required>
            </li>
            <li>
                <label for="deskripsi">Deskripsi: </label>
                <textarea name="deskripsi" id="deskripsi"></textarea>
                <!-- <input type="text" name="deskripsi" id="deskripsi" required> -->
            </li>
            <li>
                <button type="submit" name="submit">Tambah Data!</button>
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