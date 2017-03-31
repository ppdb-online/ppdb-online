<?php
echo"<div class='rightpanel'>
        
        <ul class='breadcrumbs'>
            <li><a href='dashboard.html'><i class='iconfa-home'></i></a> <span class='separator'></span></li>
            <li>Dashboard</li>
            
        </ul>
        
        <div class='pageheader'>
           
            <div class='pageicon'><span class='iconfa-laptop'></span></div>
            <div class='pagetitle'>
			

                <h2>Dashboard</h2>
                <h1>$_SESSION[namalengkap]</h1>
            </div>
        </div><!--pageheader-->
        
        <div class='maincontent'>
            <div class='maincontentinner'>
                <div class='row-fluid'>
                    <div id='dashboard-left' class='span8'>
                        
                       
                        <ul class='shortcuts'>
                            <li class='events'>
                                <a href='media.php?module=halamanstatis'>
                                    <span class='shortcuts-icon iconsi-cart'></span>
                                    <span class='shortcuts-label'>Profil Sekolah</span>
                                </a>
                            </li>
                            <li class='products'>
                                <a href='media.php?module=berita'>
                                    <span class='shortcuts-icon iconsi-archive'></span>
                                    <span class='shortcuts-label'>Menu Berita</span>
                                </a>
                            </li>
							 <li class='help'>
                                <a href='media.php?module=info'>
                                    <span class='shortcuts-icon iconsi-help'></span>
                                    <span class='shortcuts-label'>Info PPDB</span>
                                </a>
                            </li>
                            <li class='archive'>
                                <a href='media.php?module=identitas'>
                                    <span class='shortcuts-icon iconsi-images'></span>
                                    <span class='shortcuts-label'>Setting Web</span>
                                </a>
                            </li>
                           
                            <li class='last images'>
                                <a href='media.php?module=content'>
                                    <span class='shortcuts-icon iconsi-event'></span>
                                    <span class='shortcuts-label'>Setting Layout</span>
                                </a>
                            </li>
                        </ul>
                        
                        <br />
                        
                        
                        
                        
                    </div><!--span8-->
                    
                    <div id='dashboard-right' class='span4'>
                        
                       
                       
                            <div id='tabs-3' class='nopadding'>
                                <h5 class='tabtitle'>Statistik Pengunjung</h5>";
                                $ip      = $_SERVER['REMOTE_ADDR']; // Mendapatkan IP komputer user
              $tanggal = date("Ymd"); // Mendapatkan tanggal sekarang
              $waktu   = time(); // 

              // Mencek berdasarkan IPnya, apakah user sudah pernah mengakses hari ini 
              $s = mysql_query("SELECT * FROM statistik WHERE ip='$ip' AND tanggal='$tanggal'");
              // Kalau belum ada, simpan data user tersebut ke database
              if(mysql_num_rows($s) == 0){
                mysql_query("INSERT INTO statistik(ip, tanggal, hits, online) VALUES('$ip','$tanggal','1','$waktu')");
              } 
              else{
                mysql_query("UPDATE statistik SET hits=hits+1, online='$waktu' WHERE ip='$ip' AND tanggal='$tanggal'");
              }

              $pengunjung       = mysql_num_rows(mysql_query("SELECT * FROM statistik WHERE tanggal='$tanggal' GROUP BY ip"));
              $totalpengunjung  = mysql_result(mysql_query("SELECT COUNT(hits) FROM statistik"), 0); 
              $hits             = mysql_fetch_assoc(mysql_query("SELECT SUM(hits) as hitstoday FROM statistik WHERE tanggal='$tanggal' GROUP BY tanggal")); 
              $totalhits        = mysql_result(mysql_query("SELECT SUM(hits) FROM statistik"), 0); 
              $tothitsgbr       = mysql_result(mysql_query("SELECT SUM(hits) FROM statistik"), 0); 
              $bataswaktu       = time() - 300;
              $pengunjungonline = mysql_num_rows(mysql_query("SELECT * FROM statistik WHERE online > '$bataswaktu'"));

              $path = "counter/";
              $ext = ".png";

              $tothitsgbr = sprintf("%06d", $tothitsgbr);
              for ( $i = 0; $i <= 9; $i++ ){
	               $tothitsgbr = str_replace($i, "<img src='$path$i$ext' alt='$i'>", $tothitsgbr);
              }
			  echo "<table id='dyntable' class='table table-bordered'>
				
	
                    <tr class='gradeX'><td class='news-title'><img src=../counter/hariini.png> Pengunjung hari ini </td><td class='news-title'> : $pengunjung </td></tr>
                    <tr><td class='news-title'><img src=../counter/total.png> Total pengunjung </td><td class='news-title'> : $totalpengunjung </td></tr>
                    <tr><td class='news-title'><img src=../counter/hariini.png> Hits hari ini </td><td class='news-title'> : $hits[hitstoday] </td></tr>
                    <tr><td class='news-title'><img src=../counter/total.png> Total Hits </td><td class='news-title'> : $totalhits </td></tr>
                    <tr><td class='news-title'><img src=../counter/online.png> Pengunjung Online </td><td class='news-title'> : $pengunjungonline </td></tr>
                    </table>";
                            echo"</div>
                        </div><!--tabbedwidget-->
                        
                        <br />
                                                
                    </div><!--span4-->";
               
               include "footer.php";
                
            echo"</div><!--maincontentinner-->
        </div><!--maincontent-->
        
    </div><!--rightpanel-->";
	?>