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

// Hapus banner
if ($module=='banner' AND $act=='hapus'){
  $data=mysql_fetch_array(mysql_query("SELECT gambar FROM banner WHERE id_banner='$_GET[id]'"));
  if ($data['gambar']!=''){
  mysql_query("DELETE FROM banner WHERE id_banner='$_GET[id]'");
     unlink("../../../foto_banner/$_GET[namafile]");   
  }
  else{
  mysql_query("DELETE FROM banner WHERE id_banner='$_GET[id]'");  
  }
  header('location:../../media.php?module='.$module);
}



// Input banner
elseif ($module=='banner' AND $act=='input'){
  $lokasi_file = $_FILES['fupload']['tmp_name'];
  $nama_file   = $_FILES['fupload']['name'];

  // Apabila ada gambar yang diupload
  if (!empty($lokasi_file)){
    Uploadbanner ($nama_file);
    mysql_query("INSERT INTO banner(judul,
	                               
                                    url,
                                    tgl_posting,
                                    gambar) 
                            VALUES('$_POST[judul]',
							 
                                   '$_POST[url]',
                                   '$tgl_sekarang',
                                   '$nama_file')");
  }
  else{
    mysql_query("INSERT INTO banner(judul,
	                                  
                                    tgl_posting,
                                    url) 
                            VALUES('$_POST[judul]',
							 
                                   '$tgl_sekarang',
                                   '$_POST[url]')");
  }
  header('location:../../media.php?module='.$module);
}

// Update banner
elseif ($module=='banner' AND $act=='update'){
  $lokasi_file = $_FILES['fupload']['tmp_name'];
  $nama_file   = $_FILES['fupload']['name'];

  // Apabila gambar tidak diganti
  if (empty($lokasi_file)){
    mysql_query("UPDATE banner SET judul     = '$_POST[judul]',
                                   url       = '$_POST[url]'
                             WHERE id_banner = '$_POST[id]'");
  }
  else{
    
	$data_gambar = mysql_query("SELECT gambar FROM banner WHERE id_banner='$_POST[id]'");
	$r    	= mysql_fetch_array($data_gambar);
	@unlink('../../../foto_banner/'.$r['gambar']);
	@unlink('../../../foto_banner/'.'small_'.$r['gambar']);
	Uploadbanner ($nama_file);
	
    mysql_query("UPDATE banner SET judul     = '$_POST[judul]',
                                   url       = '$_POST[url]',
                                   gambar    = '$nama_file'   
                             WHERE id_banner = '$_POST[id]'");
  }
  header('location:../../media.php?module='.$module);
}
}
?>
