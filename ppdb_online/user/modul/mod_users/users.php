
<script>
function confirmdelete(delUrl) {
   if (confirm("Anda yakin ingin menghapus?")) {
      document.location = delUrl;
   }
}
</script>
<?php
function GetCheckboxes($table, $key, $Label, $Nilai='') {
  $s = "select * from $table order by nama_tag";
  $r = mysql_query($s);
  $_arrNilai = explode(',', $Nilai);
  $str = '';
  while ($w = mysql_fetch_array($r)) {
    $_ck = (array_search($w[$key], $_arrNilai) === false)? '' : 'checked';
    $str .= "<input type=checkbox name='".$key."[]' value='$w[$key]' $_ck>$w[$Label] ";
  }
  return $str;
}

$aksi="modul/mod_users/aksi_users.php";
switch($_GET[act]){
  // Tampil Berita
  default:
  echo"<div class='rightpanel'>
        
        <ul class='breadcrumbs'>
            <li><a href='media.php?module=home'><i class='iconfa-home'></i></a> <span class='separator'></span></li>
           
            <li>Users</li>
            
           
        </ul>
        
        <div class='pageheader'>
            
            <div class='pageicon'><span class='iconfa-user'></span></div>
            <div class='pagetitle'>
                <h5>Administrasi Users</h5>
                <h1>Users</h1>
            </div>
        </div><!--pageheader-->
        
        <div class='maincontent'>
            <div class='maincontentinner'>

                <h4 class='widgettitle'>
				<a href='?module=users&act=tambahusers' class='btn btn-warning btn-rounded'><i class='icon-plus icon-white'></i>Tambah User</a>
				</h4>
                
            	<table id='dyntable' class='table table-bordered'>
                    <colgroup>
                        <col class='con0' style='align: center; width: 4%' />
                        <col class='con1' />
                        <col class='con0' />
                        <col class='con1' />
                        <col class='con0' />
                        <col class='con1' />
                    </colgroup>
                    <thead>
                        <tr>
                          	<th class='head0 nosort'>No</th>
                            <th class='head0'>Username</th>
                            <th class='head1'>Nama Lengkap</th>
                            <th class='head0'>Email</th>
							<th class='head0'>Foto</th>
							<th class='head0'>Blokir</th>
                            <th class='head1'>Aksi</th>
                           
                        </tr>
                    </thead><tbody>";
					if ($_SESSION[leveluser]=='admin'){
      $tampil = mysql_query("SELECT * FROM users ORDER BY id_session DESC");
    }
    else{
      $tampil=mysql_query("SELECT * FROM users WHERE username='$_SESSION[namauser]'");
    }
						   $no = 1;
   							 while($r=mysql_fetch_array($tampil)){
     					 	$tgl_posting=tgl_indo($r[tanggal]);
	 					 	
                   				 echo"<tr class='gradeX'>
                                                    <td class='aligncenter'><span class='center'>
                            <input type='checkbox' />
                          </span></td>
                			<td>$r[username]</td>
							<td>$r[nama_lengkap]</td>
							<td><a href=mailto:$r[email]>$r[email]</a></td>
                			<td><center><img src='../foto_user/small_$r[foto]' width=50></center></td>
							<td>$r[blokir]</td>
		         			<td><a href='media.php?module=users&act=editusers&username=$r[username]' class='btn btn-info btn-circle'><i class='iconfa-pencil'></i></a>  				  
							
							</td>
                        </tr>";
					}
                echo"</tbody></table>";					   
                    
               
                include "footer.php";
                echo"
            
            </div><!--maincontentinner-->
        </div><!--maincontent-->
        
    </div><!--rightpanel-->";
	
    break; 
	case "tambahusers":
    if ($_SESSION[leveluser]=='admin'){
    echo "<h2>Tambah User</h2>
          <form method=POST action='$aksi?module=users&act=input'>
          <table class='list'>
          <tr><td>Username</td>     <td> : <input type=text name='username'></td></tr>
          <tr><td>Password</td>     <td> : <input type=text name='password'></td></tr>
          <tr><td>Nama Lengkap</td> <td> : <input type=text name='nama_lengkap' size=30></td></tr>  
          <tr><td>E-mail</td>       <td> : <input type=text name='email' size=30></td></tr>
          <tr><td>No.Telp/HP</td>   <td> : <input type=text name='no_telp' size=20></td></tr>
          <tr><td colspan=2><input type=submit value=Simpan>
                            <input type=button value=Batal onclick=self.history.back()></td></tr>
          </table></form>";
    }
    else{
      echo "Anda tidak berhak mengakses halaman ini.";
    }
     break;

	case "editusers":
   $edit = mysql_query("SELECT * FROM users WHERE username='$_GET[username]'");
    $r    = mysql_fetch_array($edit);
   echo"<div class='rightpanel'>
        
        <ul class='breadcrumbs'>
            <li><a href='dashboard.html'><i class='iconfa-home'></i></a> <span class='separator'></span></li>
            <li><a href='users.html'>Users</a> <span class='separator'></span></li>
             <li>Edit Users</li>
            
           
        </ul>
        
        <div class='pageheader'>
            
            <div class='pageicon'><span class='iconfa-pencil'></span></div>
            <div class='pagetitle'>
                <h5>Forms</h5>
                <h1>Edit Users $r[nama_lengkap]</h1>
            </div>
        </div><!--pageheader-->
        
        <div class='maincontent'>
            <div class='maincontentinner'>
               <div class='widgetbox box-inverse'>
                <h4 class='widgettitle'>Edit Users</h4>
                <div class='widgetcontent nopadding'>
				<form class='stdform stdform2' method=POST action='$aksi?module=users&act=update' enctype='multipart/form-data'>
				<input type=hidden name=id value=$r[id_session]>
                    
					
                            <p>
                                <label>Username</label>
                                <span class='field'><input type='text' name='username' value='$r[username]' disabled id='firstname2' class='input-xxlarge' />
								<small></br><span class style=\"color:#EA1C1C;\">Username Tidak Bisa Di Ubah</small></span>
								 
                            </p>
							
							<p>
                                <label>Password</label>
                                <span class='field'><input type='text' name='password' id='firstname2' class='input-xxlarge' />
								
                            </p>
                            
							                   
                            <p>
                            <label>Nama Lengkap</label><span class='field'><input type='text' name='nama_lengkap' value='$r[nama_lengkap]' id='firstname2' class='input-xxlarge' />
                            </p>
							
							<p>
                            <label>Email</label><span class='field'><input type='text' name='email' value='$r[email]' id='firstname2' class='input-xxlarge' />
                            </p>
                            
                            <p>
                                <label>Foto</label>";
  							 if ($r[foto]!=''){
  							 echo "<span class='field'><img src='../foto_user/small_$r[foto]' width=100>";
							 } 	  
								echo"</span>
                            </p>
							 <p>
                                <label>Ganti Foto</label>
                                <span class='field'>
								<input type=file name='fupload' size=40> 
                                          <br>Tipe gambar harus JPG/JPEG dan ukuran lebar maks: 100 px
								</span>
                            </p>
							 <p>
                                <label>Blokir</label>";
		  
	
    if ($r[blokir]=='N'){
      echo "<span class='field'>Blokir : <input type=radio name='blokir' value='Y'> Ya   
                                           <input type=radio name='blokir' value='N' checked> Tidak </span>";}
    else{
      echo "<span class='field'>Blokir : <input type=radio name='blokir' value='Y' checked> Ya  
                                          <input type=radio name='blokir' value='N'> Tidak </span>";}
                            echo"</p>
							<p class='stdformbutton'>
                                <button class='btn btn-primary'>Update</button>
								<input type=button value=Batal onclick=self.history.back() class='btn btn-warning btn-rounded'>
                                
                            </p>
                    </form>
                </div><!--widgetcontent-->
            </div><!--widget-->";					   
                    
               
                include "footer.php";
                echo"
                
            </div><!--maincontentinner-->
        </div><!--maincontent-->
        
    </div><!--rightpanel-->";
   
   
    break; 
}
?>
