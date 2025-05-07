<?php
session_start();

// jika tidak ada sesi login maka user dipindahkan ke login
if( !isset($_SESSION["login"]) ) {
    header("Location: login.php");
    exit;
}

require 'function.php';

// ambil data di URL
$id = $_GET["id"];

// query data mahasiswa berdasarkan id
$todo = query("SELECT * FROM todolist WHERE id = $id")[0];

// cek apakah tombol submit sudah ditekan atau belum
if( isset($_POST["submit"])) {
    
    // cek apakah data berhasil diubah atau tidak
    if( ubah($_POST) > 0) {
        echo "
            <script>
                alert('data berhasil diubah');
                document.location.href = 'index.php';
            </script>
        ";
    } else {
        echo "
            <script>
                alert('data gagal diubah');
                document.location.href = 'index.php';
            </script>
        ";
    }
}

?>
<!DOCTYPE html>
<html>
<head>
    <title>Ubah data todolist</title>
</head>
<body>
    <h1>Ubah data todolist</h1>

    <form action="" method="post">
        <input type="hidden" name="id" value="<?= $todo["id"]; ?>">
        <ul>
            <li>
                <label for="nim">Nim : </label>
                <input type="text" name="nim" id="nim"
                require value="<?= $todo["nim"]; ?>">
            </li>
            <li>
                <label for="username">nama : </label>
                <input type="text" name="username" id="username"
                require value="<?= $todo["username"]; ?>">
            </li>
            <li>
                <label for="tugas">Tugas : </label>
                <input type="text" name="tugas" id="tugas"
                require value="<?= $todo["tugas"]; ?>">
            </li>
            <li>
                <label for="status">Status : </label>
                <input type="text" name="status" id="status"
                require value="<?= $todo["status"]; ?>">
            </li>
            <li>
                <button type="submit" name="submit">
                    Submit
                </button>
            </li>
        </ul>

    </form>
</body>
</html>