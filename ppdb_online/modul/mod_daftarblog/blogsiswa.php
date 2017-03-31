<?php

$sq = mysql_query("SELECT hit,url from  blogsiswa  where id_blogsiswa ='$_GET[id]'");
$n = mysql_fetch_array($sq);	
mysql_query("UPDATE blogsiswa SET hit=$n[hit]+1 where id_blogsiswa ='$_GET[id]'");

  header('location:'.$n[url]);