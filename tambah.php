<?php
session_start();

// jika tidak ada sesi login maka user dipindahkan ke login
if( !isset($_SESSION["login"]) ) {
    header("Location: login.php");
    exit;
}

require 'function.php';

// cek apakah tombol submit sudah ditekan atau belum
if( isset($_POST["submit"])) {
    
    // cek apakah data berhasil ditambah atau tidak
    if( tambah($_POST) > 0) {
        echo "
            <script>
                alert('data berhasil ditambahkan');
                document.location.href = 'index.php';
            </script>
        ";
    } else {
        echo "
            <script>
                alert('data gagal ditambahkan');
                document.location.href = 'index.php';
            </script>
        ";
    }
}

?>
<!DOCTYPE html>
<html>
<head>
    <title>Tambah data todolist</title>
</head>
<body>
    <h1>Tambah data todolist</h1>

    <form action="" method="post">
        <ul>
            <li>
                <label for="nim">Nim : </label>
                <input type="text" name="nim" id="nim"
                require>
            </li>
            <li>
                <label for="username">nama : </label>
                <input type="text" name="username" id="username"
                require>
            </li>
            <li>
                <label for="tugas">Tugas : </label>
                <input type="text" name="tugas" id="tugas"
                require>
            </li>
            <li>
                <label for="status">Status : </label>
                <input type="text" name="status" id="status"
                require>
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