<div class="main-content-split">
    <div class="main-split-left">
 <!-- BEGIN .content-panel -->
								<div class="content-panel">
									<div class="panel-header">
										<b style="background:#6d8b13;"><span class="icon-text">&#9871;</span>Agenda</b>
										<div class="top-right"><a href="semua-agenda.html">Lihat Semua Agenda</a></div>
									</div>
									<div class="panel-content">
										
										<!-- BEGIN .article-big-block -->
										<?php
										$agenda=mysql_query("SELECT * FROM agenda ORDER BY id_agenda DESC LIMIT 1");	
										while($t=mysql_fetch_array($agenda)){
										$isi_agenda = htmlentities(strip_tags($t['isi_agenda'])); // membuat paragraf pada isi berita dan mengabaikan tag html
										$isi = substr($isi_agenda,0,200); // ambil sebanyak 150 karakter
										$isi = substr($isi_agenda,0,strrpos($isi," ")); // potong per spasi kalimat
										echo"<div class='article-big-block'>
											<div class='article-photo'>
												<span class='image-hover'>
													<span class='drop-icons'>
														<span class='icon-block'><a href='#' title='Show Image' class='icon-loupe legatus-tooltip'>&nbsp;</a></span>
												<span class='icon-block'><a href='agenda-$t[tema_seo].html' title='$t[tema]' class='icon-link legatus-tooltip'>&nbsp;</a></span>
													</span>
													<img src='foto_agenda/$t[gambar]' class='setborder' alt='$t[tema]' />
												</span>
											</div>
											
											<div class='article-header'>
												<h2><a href='agenda-$t[tema_seo].html'>$t[tema]</a></h2>
											</div>
											
											<div class='article-content'>
												<p>$isi...</p>
											</div>
											
											<div class='article-links'>
												
												<a href='agenda-$t[tema_seo].html' title='$t[tema]' class='article-icon-link'><span class='icon-text'>&#59212;</span>Selengkapnya</a>
											</div>
										<!-- END .article-big-block -->
										</div>";
										}
										?>
										
										<!-- BEGIN .article-array -->
										<ul class="article-array content-category">
										<?php
										$agenda=mysql_query("SELECT * FROM agenda ORDER BY id_agenda DESC LIMIT 1,3");	
										while($t=mysql_fetch_array($agenda)){
										echo"<li>
										<a href='agenda-$t[tema_seo].html'>$t[tema]</a>
										</li>";
										}
										?>
										</ul>

									</div>
								<!-- END .content-panel -->
								</div>                       
     
  	</div>
    
    
    
        <div class="main-split-right">
 <!-- BEGIN .content-panel -->
								<div class="content-panel">
									<div class="panel-header">
										<b style="background:#9f3819;"><span class="icon-text">&#9871;</span>Pengumuman</b>
										<div class="top-right"><a href="semua-pengumuman.html">Lihat Semua Pengumuman</a></div>
									</div>
									<div class="panel-content">
										
										<!-- BEGIN .article-big-block -->
										<?php
										$pengumuman=mysql_query("SELECT * FROM pengumuman ORDER BY id_pengumuman DESC LIMIT 1");	
										while($t=mysql_fetch_array($pengumuman)){
										$isi_pengumuman = htmlentities(strip_tags($t['isi_pengumuman'])); // membuat paragraf pada isi berita dan mengabaikan tag html
										$isi = substr($isi_pengumuman,0,200); // ambil sebanyak 150 karakter
										$isi = substr($isi_pengumuman,0,strrpos($isi," ")); // potong per spasi kalimat
										echo"<div class='article-big-block'>
											<div class='article-photo'>
												<span class='image-hover'>
													<span class='drop-icons'>
														<span class='icon-block'><a href='#' title='Show Image' class='icon-loupe legatus-tooltip'>&nbsp;</a></span>
												<span class='icon-block'><a href='pengumuman-$t[tema_seo].html' title='$t[tema]' class='icon-link legatus-tooltip'>&nbsp;</a></span>
													</span>
													<img src='foto_agenda/$t[gambar]' class='setborder' alt='$t[tema]' />
												</span>
											</div>
											
											<div class='article-header'>
												<h2><a href='pengumuman-$t[tema_seo].html'>$t[tema]</a></h2>
											</div>
											
											<div class='article-content'>
												<p>$isi...</p>
											</div>
											
											<div class='article-links'>
												
												<a href='pengumuman-$t[tema_seo].html' title='$t[tema]' class='article-icon-link'><span class='icon-text'>&#59212;</span>Selengkapnya</a>
											</div>
										<!-- END .article-big-block -->
										</div>";
										}
										?>
										
										<!-- BEGIN .article-array -->
										<ul class="article-array content-category">
										<?php
										$pengumuman=mysql_query("SELECT * FROM pengumuman ORDER BY id_pengumuman DESC LIMIT 1,3");	
										while($t=mysql_fetch_array($pengumuman)){
										echo"<li>
										<a href='pengumuman-$t[tema_seo].html'>$t[tema]</a>
										</li>";
										}
										?>
										</ul>

									</div>
								<!-- END .content-panel -->
								</div>                       
     
  	</div>
    
</div>
   

					