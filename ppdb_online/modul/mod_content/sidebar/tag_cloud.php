<!-- BEGIN .panel -->
							<div class="panel">
								<h3>Tag Cloud</h3>
								<div class="tagcloud">
                                <?php
								$tag = mysql_query("SELECT * FROM tag ORDER BY id_tag");
$ambil = mysql_num_rows(mysql_query("SELECT id_berita FROM berita"));
while ($var=mysql_fetch_array($tag)) {
$an = mysql_query("SELECT count(id_berita) as jml, tag FROM berita WHERE
tag LIKE '%$var[tag_seo]%'");
$kk = mysql_fetch_array($an);
if ($kk['jml'] > 0) {
$px = (($kk['jml']*100)/$ambil)+100;
echo " <a href='tag-$var[tag_seo].html'>$var[nama_tag]</a>";
mysql_query("UPDATE tag SET count =$kk[jml] WHERE id_tag = $var[id_tag]");
}
else {echo " ";}
}									
echo "<br />";

echo"</div>
<!-- END .panel -->
</div>";
?>