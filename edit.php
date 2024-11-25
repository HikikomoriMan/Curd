<?php
include('db.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];
    $nama = $_POST['nama'];
    $email = $_POST['email'];

    $query = "UPDATE users SET nama='$nama', email='$email' WHERE id='$id'";

    if ($conn->query($query)) {
        header("Location: index.php");
    } else {
        echo "Error: " . $conn->error;
    }
} else {
    $id = $_GET['id'];
    $result = $conn->query("SELECT * FROM users WHERE id = '$id'");
    $user = $result->fetch_assoc();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Pengguna</title>
</head>
<body>
    <h1>Edit Pengguna</h1>
    <form method="POST">
        <input type="hidden" name="id" value="<?php echo $user['id']; ?>">
        <label for="nama">Nama:</label>
        <input type="text" name="nama" value="<?php echo $user['nama']; ?>" required><br><br>
        <label for="email">Email:</label>
        <input type="email" name="email" value="<?php echo $user['email']; ?>" required><br><br>
        <button type="submit">Simpan Perubahan</button>
    </form>
    <br><br>
    <a href="index.php">Kembali ke Daftar Pengguna</a>
</body>
</html>
