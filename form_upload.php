<html>
<head>
  <title>Form Upload Gambar</title>
  <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
  <h1><b>Form Upload Gambar<b></h1><hr>
  <a href="index.php" class="tambah_btn">Beranda</a> <a href="index_upload.php" class="tambah_btn">Galeri</a><br><br>

  <table class="table2">
  <tr>
  <td>
  <form method="post" enctype="multipart/form-data" action="proses_upload.php" align="center">
    <input type="file" name="gambar">
    <input type="submit" value="Upload">
  </form>
</td>
</tr>
</table>
</body>
</html>