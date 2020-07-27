<?php 
// koneksi database
include "koneksi.php";
 
// menangkap data id yang di kirim dari url ke dalam variabel
$id = $_GET['id'];
 
 
// menghapus data dari database
$sql = "DELETE FROM gambar WHERE id=$id";
$query = mysqli_query($db, $sql);
 
// mengalihkan halaman kembali ke indek
header("location:index_upload.php");
 
?>