<?php
session_start();
include "config/koneksi.php";
include "config/library.php";



$nama_lengkap = $_POST['nama_komentar'];
$email = $_POST['email'];
$komentar=trim($_POST['pesan']);
  $iden=mysql_fetch_array(mysql_query("SELECT * FROM identitas"));
  
  $zali=mysql_fetch_array(mysql_query("SELECT * FROM berita,komentar 
  WHERE komentar.id_berita=berita.id_berita"));
  


if (strlen($_POST['pesan']) > 1000) {
  echo "KOMENTAR Anda kepanjangan, dikurangin atau dibagi jadi beberapa bagian.<br />
  	      <a href=javascript:history.go(-1)><b>Ulangi Lagi</b>";
}
else{
function antiinjection($data){
  $filter_sql = mysql_real_escape_string(stripslashes(strip_tags(htmlspecialchars($data,ENT_QUOTES))));
  return $filter_sql;
}


$isi_komentar = $_POST['pesan'];
$nama_lengkap = $_POST['nama_komentar'];
$username = $_POST['email'];




    $sql = mysql_query("INSERT INTO komentar(nama_komentar,
												isi_komentar,
												id_berita,
												tgl,
												jam_komentar,												
												email
												) 
                        VALUES('$nama_lengkap',
								'$_POST[pesan]',
								'$_POST[id]',
								'$tgl_sekarang',
								'$jam_sekarang',								
								'$username')");
						
$row=mysql_fetch_array(mysql_query("SELECT * FROM berita WHERE id_berita=$_POST[id]"));
    echo "<meta http-equiv='refresh' content='0; url=berita-$row[judul_seo].html'>";
	
 }


?>
