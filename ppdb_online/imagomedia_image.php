<?php
if (isset($_GET['judul'])){
    $sql = mysql_query("select judul from berita where judul_seo='$_GET[judul]'");
    $j   = mysql_fetch_array($sql);
    

		echo "foto_berita/$j[gambar]";
}
else{
		echo "default.jpg";
}
?>

