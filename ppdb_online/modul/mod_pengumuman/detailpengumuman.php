       			<!-- BEGIN .content -->
			<div class="content">				
				<!-- BEGIN .wrapper -->
				<div class="wrapper">
                <div class="main-content-left">
        <div class="content-article-title">
                <h2>Detail Pengumuman Sekolah</h2>
            <div class="right-title-side">
                <a href="./"><span class="icon-text">&#8962;</span>Back To Homepage</a>
            </div>
        </div>

        <div class="main-nosplit">
      <div class="track"><div class="thumb"><div class="end"></div></div></div></div>
        	<div class="viewport">
        	<div class="overview">

	<div class="shortcode-content">
  
  <?php
  $detail=mysql_query("SELECT * FROM pengumuman,users WHERE tema_seo='$_GET[tema]'");
  $d   = mysql_fetch_array($detail);
  $tgl_posting   = tgl_indo($d['tgl_posting']);

  $isi_pengumuman=nl2br($d['isi_pengumuman']);
  $baca = $d['dibaca']+1;
  echo"<div class='main-article-content'>
							<h2 class='article-title'>$d[tema]</h2>";
  mysql_query("UPDATE pengumuman  SET dibaca='$baca'  WHERE tema_seo='$_GET[tema]'");
	
	
echo"<div class='article-photo'>
								<img src='foto_agenda/$d[gambar]' width=680 class='setborder' alt='' />
							</div>
							<!-- BEGIN .article-controls -->
							<div class='article-controlers'>

								<div class='right-side'>
									<div class='colored'>										
							<div class='section'>     
							  <div class='addthis_toolbox addthis_default_style '>
							  <a class='addthis_button_preferred_1'></a>
							  <a class='addthis_button_preferred_2'></a>
							  <a class='addthis_button_preferred_3'></a>
							  <a class='addthis_button_preferred_4'></a>
							  <a class='addthis_button_compact'></a>
							  <a class='addthis_counter addthis_bubble_style'></a>
							  </div>
							  <script type='text/javascript' src='http://s7.addthis.com/js/250/addthis_widget.js#pubid=ra-4f8aab4674f1896a'></script>  
							  </div>
									</div>
									<div>										
										<a href='#' class='icon-link'><span class='icon-text'>&#59160;</span>Dibaca sebanyak $baca kali</a>
									</div>
								</div>

								<div class='clear-float'></div>

							<!-- END .article-controls -->
							</div>
							<!-- BEGIN .shortcode-content -->
							<div class='shortcode-content'>
							
							<!-- END .shortcode-content -->
							</div>";

  echo "<b>Isi Pengumuman</b>:
  <div class='isipengumuman'>$isi_pengumuman</div><br/>";

   
   // FB Comment//////////////////////////////////////////////////////////////////////////
  echo "<br/><img src='images/komen.jpg' width='683' height='43'/><br/><br/>
";  
	$identitas=mysql_query("select * from identitas"); 
	$i   = mysql_fetch_array($identitas);
  echo"<div class='fb-comments' data-href='$i[url]/pengumuman-$d[tema_seo].html' data-width='470'></div>";
    
  ?>
 
  </div></div> </div></div> </div> 
  

 