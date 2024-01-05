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
$brt = query("SELECT * FROM dokumen WHERE id = $id")[0];

//cek apakah tombol submit sudah ditekan atau belum
if (isset($_POST["submit"])) {

    //cek apakah data berhasil diubah atau tidak
    if (ubahDokumen($_POST) > 0) {
        echo "
            <script>
                alert('data berhasil diubah!');
                document.location.href = 'dokumen.php';
            </script>
        ";
    } else {
        echo "
            <script>
                alert('data gagal diubah!');
                document.location.href = 'dokumen.php';
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
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        form {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 300px;
        }

        h1 {
            text-align: center;
            color: #333;
        }

        label {
            display: block;
            margin-bottom: 8px;
        }

        input {
            width: 100%;
            padding: 8px;
            margin-bottom: 16px;
            box-sizing: border-box;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        button {
            background-color: #4caf50;
            color: white;
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
        <h1>Ubah Dokumen</h1>
        <input type="hidden" name="id" value="<?= $brt["id"]; ?>">
        <input type="hidden" name="fileLama" value="<?= $brt["berkas"]; ?>">
        
        <label for="nama">Nama Dokumen: </label>
        <input type="text" name="nama" id="nama" required value="<?= $brt["nama"]; ?>">

        <label for="doc">File: </label>
        <input type="file" name="pdf" id="doc">

        <button type="submit" name="submit">Ubah Data!</button>



    </form>
</body>

</html>