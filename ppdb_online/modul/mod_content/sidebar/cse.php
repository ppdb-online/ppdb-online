<div class="panel">
			<h3>Google Search</h3>
			<div class="banner">
		  	<?php
			$cse=mysql_query("select * from cse"); 
  			$g=mysql_fetch_array($cse);
				echo"$g[search_box]";
			
			?>
         </div>
      </div>