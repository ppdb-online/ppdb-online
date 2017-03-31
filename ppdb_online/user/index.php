<!DOCTYPE html>
<html>
<head>

<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<title>...:::Imago Media | Blog Serba Ada::......</title>
<link rel="stylesheet" href="css/style.default.css" type="text/css" />




<script type="text/javascript">
    jQuery(document).ready(function(){
        jQuery('#login').submit(function(){
            var u = jQuery('#username').val();
            var p = jQuery('#password').val();
            if(u == '' && p == '') {
                jQuery('.login-alert').fadeIn();
                return false;
            }
        });
    });
</script>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" /></head>

<body class="loginpage">

<div class="loginpanel">
    <div class="loginpanelinner">
        <div class="logo animate0 bounceIn"><img src="images/logo.png" width="200" alt="" /></div>
        <form id="login" action="cek_login.php" method="post" />
            <div class="inputwrapper login-alert">
                <div class="alert alert-error">Invalid username or password</div>
            </div>
            <div class="inputwrapper animate1 bounceIn">
                <input type="text" name="username" id="username" placeholder="Enter any username" />
            </div>
            <div class="inputwrapper animate2 bounceIn">
                <input type="password" name="password" id="password" placeholder="Enter any password" />
            </div>
            <div class="inputwrapper animate3 bounceIn">
                <button name="submit">Sign In</button>
            </div>

            
        </form>
    </div><!--loginpanelinner-->
</div>
<!--loginpanel-->

<div class="loginfooter">
    <p>&copy; 2014. Imago Media 08174136638</p>
</div>

</body>
</html>
