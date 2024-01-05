<?php
// Content Security Policy
header("Content-Security-Policy: default-src 'self'; script-src 'self' 'unsafe-inline' 'unsafe-eval' https://cdn.jsdelivr.net; style-src 'self' 'unsafe-inline' https://cdn.jsdelivr.net https://fonts.googleapis.com https://fonts.gstatic.com; img-src 'self' data: https://cdn.jsdelivr.net https://example.com; font-src 'self' https://fonts.googleapis.com https://fonts.gstatic.com; frame-src 'self' https://www.google.com;");

//koneksi ke database
$conn = mysqli_connect("localhost", "root", "", "project_salt");

//ambil data dari tabel news
function query($query) {
    global $conn;
    $result = mysqli_query($conn, $query);
    $rows = [];
    while( $row = mysqli_fetch_assoc($result) ){
        $rows[]=$row;
    }
    return $rows;
}

function tambah($data) {
    global $conn;

    //ambil data dari tiap elemen dalam form
    $tanggal = htmlspecialchars($data["tanggal"]);
    $nama = htmlspecialchars($data["nama"]);
    $deskripsi = $data["deskripsi"];

    //upload gambar
    $gambar = upload();
    if( !$gambar ){
        return false;
    } 

    //query insert data
    $query = "INSERT INTO news VALUES ('','$tanggal','$nama', '$deskripsi', '$gambar')";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

function tambahDokumen($data) {
    global $conn;

    //ambil data dari tiap elemen dalam form
    $nama = htmlspecialchars($data["nama"]);

    //upload gambar
    $file = uploadDokumen();
    if( !$file ){
        return false;
    } 

    //query insert data
    $query = "INSERT INTO dokumen VALUES ('','$nama', '$file')";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

function tambahOrganisasi() {
    global $conn;

    //upload gambar
    $gambar = upload();
    if( !$gambar ){
        return false;
    } 

    //query insert data
    $query = "INSERT INTO organisasi VALUES ('', '$gambar')";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

function tambahPesan($data) {
    global $conn;

    //ambil data dari tiap elemen dalam form
    $email = htmlspecialchars($data["email"]);
    $pesan = htmlspecialchars($data["pesan"]); 

    //query insert data
    $query = "INSERT INTO pesan VALUES ('','$email','$pesan')";
    $result = mysqli_query($conn, $query);

    if (!$result) {
        die("Query error: " . mysqli_error($conn));
    }

    return mysqli_affected_rows($conn);
}

function tambahGalery($data) {
    global $conn;

    //ambil data dari tiap elemen dalam form
    $kategori = htmlspecialchars($data["kategori"]);

    //upload gambar
    $gambar = upload();
    if( !$gambar ){
        return false;
    } 

    //query insert data
    $query = "INSERT INTO galeri (category, picture) VALUES ('$kategori', '$gambar')";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

function upload() {
    $namaFile = $_FILES['gambar']['name'];
    $ukuranFile = $_FILES['gambar']['size'];
    $error = $_FILES['gambar']['error'];
    $tmpName = $_FILES['gambar']['tmp_name'];

    //cek apakah tidak ada gambar yang diupload
    if( $error === 4){
        echo "<script>
                alert('pilih gambar terlebih dahulu');
              </script>";
        return false;
    }

    //cek apakah yang diupload adalah gambar
    $ekstensiPicValid = ['jpg','jpeg','png'];
    $ekstensiGambar = explode('.', $namaFile);
    $ekstensiGambar = strtolower(end($ekstensiGambar));
    if( !in_array($ekstensiGambar, $ekstensiPicValid)){
        echo "<script>
                alert('yang anda upload bukan gambar!');
              </script>";
        return false;
    }

    //cek jika ukurannya terlalu besar
    if($ukuranFile > 3000000){ //lebih dari 3mb
        echo "<script>
                alert('ukuran gambar terlalu besar!');
              </script>";
        return false;
    }

    //lolos cek, gambar akan di upload
    //generate nama gambar baru
    $namaFileBaru = uniqid();
    $namaFileBaru .= '.';
    $namaFileBaru .= $ekstensiGambar;

    move_uploaded_file($tmpName, 'img/' . $namaFileBaru);

    return $namaFileBaru;
}

function uploadDokumen() {
    $namaFile = $_FILES['pdf']['name'];
    $ukuranFile = $_FILES['pdf']['size'];
    $error = $_FILES['pdf']['error'];
    $tmpName = $_FILES['pdf']['tmp_name'];

    //cek apakah tidak ada gambar yang diupload
    if( $error === 4){
        echo "<script>
                alert('pilih Dokumen terlebih dahulu');
              </script>";
        return false;
    }

    //cek apakah yang diupload adalah Dokumen
    $ekstensiDocValid = ['pdf'];
    $ekstensiDokumen = pathinfo($namaFile, PATHINFO_EXTENSION);
    if( !in_array($ekstensiDokumen, $ekstensiDocValid)){
        echo "<script>
                alert('yang anda upload bukan Dokumen!');
              </script>";
        return false;
    }

    //cek jika ukurannya terlalu besar
    if($ukuranFile > 10000000){ //lebih dari 10mb
        echo "<script>
                alert('ukuran Dokumen terlalu besar!');
              </script>";
        return false;
    }

    //lolos cek, dokumen akan di upload
    //generate nama dokumen baru
    $namaFileBaru = uniqid() . '.' . $ekstensiDokumen;
    move_uploaded_file($tmpName, 'png/' . $namaFileBaru);

    return $namaFileBaru;
}

function hapus($id) {
    global $conn;

    // Get the file information before deleting from the database
    $fileInfo = query("SELECT gambar FROM news WHERE id = $id")[0];
    $fileName = $fileInfo['gambar'];

    // Delete the record from the database
    mysqli_query($conn, "DELETE FROM news WHERE id = $id");

    // Check if the record is deleted successfully from the database
    if (mysqli_affected_rows($conn) > 0) {
        // If the record is deleted, also delete the corresponding file from the 'png' folder
        unlink('img/' . $fileName);
        return true;
    } else {
        return false;
    }
    
    // global$conn;
    // mysqli_query($conn, "DELETE FROM news WHERE id=$id");
    // return mysqli_affected_rows($conn);
}

function hapusDokumen($id) {
    global $conn;

    // Get the file information before deleting from the database
    $fileInfo = query("SELECT berkas FROM dokumen WHERE id = $id")[0];
    $fileName = $fileInfo['berkas'];

    // Delete the record from the database
    mysqli_query($conn, "DELETE FROM dokumen WHERE id = $id");

    // Check if the record is deleted successfully from the database
    if (mysqli_affected_rows($conn) > 0) {
        // If the record is deleted, also delete the corresponding file from the 'png' folder
        unlink('png/' . $fileName);
        return true;
    } else {
        return false;
    }
}


// function hapusDokumen($id) {
//     global$conn;
//     mysqli_query($conn, "DELETE FROM dokumen WHERE id=$id");
//     return mysqli_affected_rows($conn);
// }

function hapusOrganisasi($id) {
    global $conn;

    // Get the file information before deleting from the database
    $fileInfo = query("SELECT gambar FROM organisasi WHERE id = $id")[0];
    $fileName = $fileInfo['gambar'];

    // Delete the record from the database
    mysqli_query($conn, "DELETE FROM organisasi WHERE id = $id");

    // Check if the record is deleted successfully from the database
    if (mysqli_affected_rows($conn) > 0) {
        // If the record is deleted, also delete the corresponding file from the 'png' folder
        unlink('img/' . $fileName);
        return true;
    } else {
        return false;
    }

    // global$conn;
    // mysqli_query($conn, "DELETE FROM organisasi WHERE id=$id");
    // return mysqli_affected_rows($conn);
}

function hapusGaleri($id) {
    global $conn;

    // Get the file information before deleting from the database
    $fileInfo = query("SELECT picture FROM galeri WHERE id = $id")[0];
    $fileName = $fileInfo['picture'];

    // Delete the record from the database
    mysqli_query($conn, "DELETE FROM galeri WHERE id = $id");

    // Check if the record is deleted successfully from the database
    if (mysqli_affected_rows($conn) > 0) {
        // If the record is deleted, also delete the corresponding file from the 'png' folder
        unlink('img/' . $fileName);
        return true;
    } else {
        return false;
    }
}

function hapusPesan($id) {
    global $conn;

    // Delete the record from the database
    mysqli_query($conn, "DELETE FROM pesan WHERE id = $id");

    // Check if the record is deleted successfully from the database
    if (mysqli_affected_rows($conn) > 0) {
        return true;
    } else {
        return false;
    }
}

function ubah($data){
    global $conn;

    $id = $data["id"];
    //ambil data dari tiap elemen dalam form
    $tanggal = htmlspecialchars($data["tanggal"]);
    $nama = htmlspecialchars($data["nama"]);
    $deskripsi = $data["deskripsi"];
    $gambarLama= htmlspecialchars($data["gambarLama"]);


    //cek apakah user pilih gambar baru/tidak
    if($_FILES['gambar']['error'] === 4){
        $gambar = $gambarLama;
    } else {
        unlink('img/' . $gambarLama);
        $gambar = upload();
    }
    

    //query insert data
    $query = "UPDATE news SET 
                tanggal = '$tanggal',
                nama = '$nama',
                deskripsi = '$deskripsi',
                gambar = '$gambar'
                WHERE id = $id
              ";
    
    
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);

}

function ubahGaleri($data){
    global $conn;

    $id = $data["id"];
    //ambil data dari tiap elemen dalam form
    $kategori = htmlspecialchars($data["kategori"]);
    $gambarLama= htmlspecialchars($data["gambarLama"]);


    //cek apakah user pilih gambar baru/tidak
    if($_FILES['gambar']['error'] === 4){
        $gambar = $gambarLama;
    } else {
        unlink('img/' . $gambarLama);
        $gambar = upload();
    }
    

    //query insert data
    $query = "UPDATE galeri SET 
                category = '$kategori',
                picture = '$gambar'
                WHERE id = $id
              ";
    
    
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);

}

function ubahDokumen($data){
    global $conn;

    $id = $data["id"];
    //ambil data dari tiap elemen dalam form
    $nama = htmlspecialchars($data["nama"]);
    $fileLama= htmlspecialchars($data["fileLama"]);


    //cek apakah user pilih gambar baru/tidak
    if($_FILES['doc']['error'] === 4){
        $file = $fileLama;
    } else {
        unlink('png/' . $fileLama);
        $file = uploadDokumen();
    }
    
    //$gambar = htmlspecialchars($data["gambar"]);
    

    //query insert data
    $query = "UPDATE dokumen SET 
                nama = '$nama',
                berkas = '$file'
                WHERE id = $id
              ";
    
    
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);

}

function ubahOrganisasi($data){
    global $conn;

    $id = $data["id"];
    //ambil data dari tiap elemen dalam form
    $gambarLama= htmlspecialchars($data["gambarLama"]);


    //cek apakah user pilih gambar baru/tidak
    if($_FILES['gambar']['error'] === 4){
        $gambar = $gambarLama;
    } else {
        unlink('img/' . $gambarLama);
        $gambar = upload();
    }
    
    //$gambar = htmlspecialchars($data["gambar"]);
    

    //query insert data
    $query = "UPDATE organisasi SET 
                gambar = '$gambar'
                WHERE id = $id
              ";
    
    
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);

}

function registrasi($data) {
    global $conn;

    $username = strtolower(stripslashes($data["username"]));
    $password = mysqli_real_escape_string($conn, $data["password"]);
    $password2 = mysqli_real_escape_string($conn, $data["password2"]);

    //cek username sudah ada atau belum
    $result = mysqli_query($conn, "SELECT username FROM user WHERE username = '$username'");

    if(mysqli_fetch_assoc($result)) {
        echo "<script>
                alert('username sudah terdaftar!')
              </script>";
        return false;
    }

    //cek konfirmasi password
    if($password !== $password2){
        echo "<script>
                alert('konfirmasi password tidak sesuai')
              </script>";
        return false;
    } 

    //enkripsi password
    $password = password_hash($password, PASSWORD_DEFAULT);

    //tambahkan userbaru ke database
    mysqli_query($conn, "INSERT INTO user VALUES('', '$username', '$password')");

    return mysqli_affected_rows($conn);
}
?>