<?php
session_start();
require 'function.php';

$user_id = $_SESSION["user_id"];
$id = $_GET["id"];

// pastikan hanya tugas milik user sendiri yang bisa dihapus
mysqli_query($conn, "DELETE FROM todolist WHERE id = $id AND user_id = $user_id");

header("Location: index.php");
exit;
