<div class="main-content-left">
		  	<?php
			$cse=mysql_query("select * from cse"); 
  			$g=mysql_fetch_array($cse);
				echo"$g[search_result]";
			
			?>
</div>

