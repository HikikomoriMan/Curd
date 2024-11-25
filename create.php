<?php
include('db.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nama = $_POST['nama'];
    $email = $_POST['email'];

    $query = "INSERT INTO users (nama, email) VALUES ('$nama', '$email')";
    
    if ($conn->query($query)) {
        header("Location: index.php");
    } else {
        echo "Error: " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Pengguna</title>
</head>
<body>
    <h1>Tambah Pengguna</h1>
    <form method="POST">
        <label for="nama">Nama:</label>
        <input type="text" name="nama" required><br><br>
        <label for="email">Email:</label>
        <input type="email" name="email" required><br><br>
        <button type="submit">Simpan</button>
    </form>
    <br><br>
    <a href="index.php">Kembali ke Daftar Pengguna</a>
</body>
</html>
