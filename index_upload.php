<html>
<head>
  <title>Data Gambar</title>
  <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<h1><b>Data Gambar</b></h1><hr>
<a href="index.php" class="tambah_btn">Beranda</a> <a href="form_upload.php" class="tambah_btn">Tambah Gambar</a><br><br>
<table border="1" cellpadding="8" class="table">
<tr>
  <th>Klik Gambar Untuk Melihat</th>
  <th>Nama File</th>
  <th>Tindakan</th>
</tr>

<script type="text/javascript" language="JavaScript"> // fungsi dalam js untuk konfirmasi saat ingin menghapus gambar
 function konfirmasi(){
 tanya = confirm("Anda Yakin Akan Menghapus Gambar Ini ?");
 if (tanya == true) 
    return true;
 else 
    return false;
 }
</script>

<?php
// koneksi database
include "koneksi.php";

$query = "SELECT * FROM gambar"; // Menampilkan gambar dari database
$sql = mysqli_query($db, $query); // Eksekusi/Jalankan query dari variabel $query
$row = mysqli_num_rows($sql); // Ambil jumlah data dari hasil eksekusi $sql

if($row > 0){ // Jika jumlah data lebih dari 0 (jika datanya ada)
  while($data = mysqli_fetch_array($sql)){ // Ambil semua data dari hasil eksekusi $sql
    // disini saya tidak menampilkan/megoutputkan ukuran dan tipe  gambarnya
    echo "<tr>";
    echo "<td><a href='file_gambar/".$data['nama']."'><img src='file_gambar/".$data['nama']."' width='120' height='120'></td>"; // menampilkan gambar dengan lebar 120px dan tinggi 120px
    echo "<td>".$data['nama']."</td>";
    echo "<td>";
    echo "<a href='hapus.php?id=".$data['id']."' class='del_btn' onclick='return konfirmasi()'>Hapus</a>";
    echo "</td>";
    echo "</tr>";
  }
}else{ // Jika data gambar tidak ada
  echo "<tr><td colspan='4'>Tidak ada gambar</td></tr>";
}
?>
</table>
</body>
</html>