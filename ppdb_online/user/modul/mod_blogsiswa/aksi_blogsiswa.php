<?php
session_start();
 if (empty($_SESSION['username']) AND empty($_SESSION['passuser'])){
  echo "<link href='style.css' rel='stylesheet' type='text/css'>
 <center>Untuk mengakses modul, Anda harus login <br>";
  echo "<a href=../../index.php><b>LOGIN</b></a></center>";
}
else{
include "../../../config/koneksi.php";
include "../../../config/library.php";
include "../../../config/fungsi_thumb.php";

$module=$_GET[module];
$act=$_GET[act];

// Hapus blogsiswa
if ($module=='blogsiswa' AND $act=='hapus'){
  $data=mysql_fetch_array(mysql_query("SELECT screenshoot FROM blogsiswa WHERE id_blogsiswa='$_GET[id]'"));
  if ($data['screenshoot']!=''){
  mysql_query("DELETE FROM blogsiswa WHERE id_blogsiswa='$_GET[id]'");
     unlink("../../../screenshoot/$data[screenshoot]");     
  }
  else{ 
  mysql_query("DELETE FROM blogsiswa WHERE id_blogsiswa='$_GET[id]'");  
}
  header('location:../../media.php?module='.$module);
}



// Input blogsiswa
elseif ($module=='blogsiswa' AND $act=='input'){
$lokasi_file = $_FILES['fupload']['tmp_name'];
  $tipe_file   = $_FILES['fupload']['type'];
  $nama_file   = $_FILES['fupload']['name'];
  $acak           = rand(000000,999999);
  $nama_file_unik = $acak.$nama_file; 
  // Apabila ada gambar yang diupload
  if (!empty($lokasi_file)){
    if ($tipe_file != "image/jpeg" AND $tipe_file != "image/pjpeg"){
    echo "<script>window.alert('Upload Gagal, Pastikan File yang di Upload bertipe *.JPG');
        window.location=('../../media.php?module=blogsiswa')</script>";
    }
    else{
    UploadScreenshoot($nama_file_unik);
    mysql_query("INSERT INTO blogsiswa(nama,
		   							   kelas,
	                                   tgl_posting,
                                    	url,
										screenshoot) 
                            VALUES('$_POST[nama]',
									'$_POST[kelas]',
							  
                                   '$tgl_sekarang',
                                   '$_POST[url]',
								   '$nama_file_unik')");
 header('location:../../media.php?module='.$module);
  }
  }
  else{
   mysql_query("INSERT INTO blogsiswa(nama,
		   							   kelas,
	                                   tgl_posting,
                                    	url) 
                            VALUES('$_POST[nama]',
									'$_POST[kelas]',							  
                                   '$tgl_sekarang',
                                   '$_POST[url]')");
  
  header('location:../../media.php?module='.$module);
  }
}

// Update blogsiswa
elseif ($module=='blogsiswa' AND $act=='update'){
  $lokasi_file = $_FILES['fupload']['tmp_name'];
  $nama_file   = $_FILES['fupload']['name'];
  $tipe_file      = $_FILES['fupload']['type'];
  $acak           = rand(000000,999999);
  $nama_file_unik = $acak.$nama_file; 
   if (empty($lokasi_file)){
    mysql_query("UPDATE blogsiswa SET nama     = '$_POST[nama]',
									kelas     = '$_POST[kelas]',
                                   url       = '$_POST[url]'
                             WHERE id_blogsiswa = '$_POST[id]'");  
  header('location:../../media.php?module='.$module);
  }
  else{
    if ($tipe_file != "image/jpeg" AND $tipe_file != "image/pjpeg"){
    echo "<script>window.alert('Upload Gagal, Pastikan File yang di Upload bertipe *.JPG');
        window.location=('../../media.php?module=blogsiswa')</script>";
    }
    else{
	$data_gambar = mysql_query("SELECT screenshoot FROM blogsiswa WHERE id_blogsiswa='$_POST[id]'");
	$r    	= mysql_fetch_array($data_gambar);
	@unlink('../../../screenshoot/'.$r['screenshoot']);
	UploadScreenshoot($nama_file_unik,'../../../Screenshoot/',300,120);
	 mysql_query("UPDATE blogsiswa SET nama     = '$_POST[nama]',
									kelas     = '$_POST[kelas]',
                                   url       = '$_POST[url]',
								   screenshoot      = '$nama_file_unik'
                             WHERE id_blogsiswa = '$_POST[id]'");  
  	header('location:../../media.php?module='.$module);
	  }
  }
}
}
?>
