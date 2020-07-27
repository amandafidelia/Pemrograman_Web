<?php
// koneksi database
include "koneksi.php";
// Ambil Data yang Dikirim dari Form
$nama_file = $_FILES['gambar']['name'];
$ukuran_file = $_FILES['gambar']['size'];
$tipe_file = $_FILES['gambar']['type'];
$tmp_file = $_FILES['gambar']['tmp_name'];
// Set path folder tempat menyimpan gambarnya
$path = "file_gambar/".$nama_file;
if($tipe_file == "image/jpeg" || $tipe_file == "image/png"){
  // Jika tipe file yang diupload JPG / JPEG / PNG, lakukan :
  if($ukuran_file <= 10000000){
    // Jika ukuran file kurang dari sama dengan 10MB, lakukan :
    // Proses upload
    if(move_uploaded_file($tmp_file, $path)){ 
      // Jika gambar berhasil diupload, Lakukan :  
      // Proses simpan ke Database
      $query = "INSERT INTO gambar(nama,ukuran,tipe) VALUES('".$nama_file."','".$ukuran_file."','".$tipe_file."')";
      $sql = mysqli_query($db, $query); // Eksekusi/ Jalankan query dari variabel $query
      
      if($sql){
        // Jika Sukses, Lakukan :
        header("location: index_upload.php"); // dihubungkan ke halaman index.php
      }else{
        // Jika Gagal :
        echo "Terjadi kesalahan saat mencoba menyimpan data ke database.";
        echo "<br><a href='form_upload.php'>Kembali Ke Form</a>";
      }
    }else{
      // Jika gambar gagal diupload :
      echo "Gambar gagal diupload.";
      echo "<br><a href='form_upload.php'>Kembali Ke Form</a>";
    }
  }else{
    // Jika ukuran file lebih dari 10MB :
    echo "Ukuran gambar yang diupload tidak boleh melebihi 10MB";
    echo "<br><a href='form_upload.php'>Kembali Ke Form</a>";
  }
}else{
  // Jika tipe file yang diupload bukan JPG / JPEG / PNG :
  echo "Tipe gambar yang diupload harus berekstensi JPG / JPEG / PNG.";
  echo "<br><a href='form_upload.php'>Kembali Ke Form</a>";
}
?>





