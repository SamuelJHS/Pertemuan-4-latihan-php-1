<?php
// koneksi ke database
$conn = mysqli_connect("localhost", "root", "", "phpdasar");

function query($query) {
    global $conn;
    $result = mysqli_query($conn, $query);
    $rows = [];
    while( $row = mysqli_fetch_assoc($result) ) {
        $rows[] = $row;
    }
    return $rows;
}



function tambah($data) {
    global $conn;
    // ambil data dari tiap elemen dalam form
    $nim = htmlspecialchars($data["nim"]);
    $username = htmlspecialchars($data["username"]);
    $tugas = htmlspecialchars($data["tugas"]);
    $status = htmlspecialchars($data["status"]);

    // query insert data
    $query = "INSERT INTO todolist
                VALUES
                ('', '$nim', '$username', '$tugas', '$status')
                ";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}


function hapus($id) {
    global $conn;
    mysqli_query($conn, "DELETE FROM todolist WHERE id = $id");
    return mysqli_affected_rows($conn);
}


function ubah($data) {
    global $conn;
    // ambil data dari tiap elemen dalam form
    $id = $data["id"];
    $nim = htmlspecialchars($data["nim"]);
    $username = htmlspecialchars($data["username"]);
    $tugas = htmlspecialchars($data["tugas"]);
    $status = htmlspecialchars($data["status"]);

    // query insert data
    $query = "UPDATE todolist SET
                nim = '$nim',
                username = '$username',
                tugas = '$tugas',
                status = '$status'
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

    // cek username sudah ada atau belum
    $result = mysqli_query($conn, "SELECT username FROM user 
        WHERE username = '$username'");
    
    if( mysqli_fetch_assoc($result) ) {
        echo "<script>
                alert('username sudah terdaftar!')
                </script>";
        return false;
    }

    // cek konfirmasi password
    if( $password !== $password2) {
        echo "<script>
                alert('konfirmasi password tidak sesuai!');
                </script>";
        return false;
    }

    // enkripsi password
    $password = password_hash($password, PASSWORD_DEFAULT);
    
    // tambahkan userbaru ke database
    mysqli_query($conn, "INSERT INTO user VALUES('', 
    '$username', '$password')");
    
    return mysqli_affected_rows($conn);

}


?>