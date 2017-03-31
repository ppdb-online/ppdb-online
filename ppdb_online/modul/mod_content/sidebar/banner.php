<div class="panel">
	<h3>Banner</h3>
	</div>
	<?php                    
   	$iklan=mysql_query("select * from banner"); 
  	while($i=mysql_fetch_array($iklan)){
	echo"<div class='panel-comment'>
	<div class='banner-block'>
	<a href='$i[url]' target='_blank' title='$i[judul]'><img src='foto_banner/$i[gambar]' width='310' height ='50' alt='$i[judul]' /></a>
	</div>
	
	<!-- END .banner -->
	</div>";
	}
	?>
