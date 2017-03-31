	<!-- BAGIAN SIDE BAR-->
	<div class="main-content-right">
    <?php
	$sidebar=mysql_query("SELECT * FROM sidebar WHERE aktif='Y' ORDER BY posisi");  
	while($p=mysql_fetch_array($sidebar)){
	include "sidebar/$p[code]";
	}
	?>    
	</div>
        