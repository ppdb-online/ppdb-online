<!-- BEGIN .panel -->
	<div class="panel">
    <h3>Facebook Fanpage</h3>
    <div class="banner">
    <?php
	$facebook=mysql_query("select * from identitas"); 
  	$f=mysql_fetch_array($facebook);
	echo"<div class='fb-like-box' data-href='$f[facebook]' data-width='300' data-show-faces='true' data-header='true' data-stream='true' data-show-border='true'></div>"
	?>
	</div>  
	</div>   
	
                                							
