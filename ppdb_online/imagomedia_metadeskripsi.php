<?php    
if (isset($_GET['judul'])){
   $sql = mysql_query("select judul from berita where judul_seo='$_GET[judul]'");
   $data   = mysql_fetch_array($sql);
    // Tampilkan hanya sebagian isi berita
    $isi_berita = htmlentities(strip_tags($data['isi_berita'])); // membuat paragraf pada isi berita dan mengabaikan tag html
    $isi = substr($isi_berita,0,180); // ambil sebanyak 180 karakter
    $isi = substr($isi_berita,0,strrpos($isi," ")); // potong per spasi kalimat
		echo "$isi";
}
else{
      $sql2 = mysql_query("select meta_deskripsi FROM identitas");
      $data2   = mysql_fetch_array($sql2);
  	  echo "$data2[meta_deskripsi]";
}
?>
