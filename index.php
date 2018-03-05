<?php
session_start();
require_once("class.user.php");
$login = new USER();

if($login->is_loggedin()!="")
{
	$login->redirect('home.php');
}

if(isset($_POST['btn-login']))
{
	$uname = strip_tags($_POST['txt_uname_email']);
	$umail = strip_tags($_POST['txt_uname_email']);
	$upass = strip_tags($_POST['txt_password']);
		
	if($login->doLogin($uname,$umail,$upass))
	{
		$login->redirect('home.php');
	}
	else
	{
		$error = "Wrong Details !";
	}	
}
?>

<html>
<head>
<title>Login</title>

</head>
<body>

       <form  method="post" id="login-form">
      
        <h2>Log In to WebApp.</h2><hr />
        
   <!-- error -->
        <?php
			if(isset($error))
			{
					echo $error;
               
			}
		?>
       
        <input type="text"  name="txt_uname_email" placeholder="Username or E mail ID" required />
        <input type="password" name="txt_password" placeholder="Your Password" />
      
       
     	<hr />
       
            <button type="submit" name="btn-login">
                &nbsp; SIGN IN
            </button>
      
            <label>Don't have account yet ! <a href="adduser.php">Sign Up</a></label>
      </form>
<hr />
<pre>
Add this to your directory as a .htaccess file .  If it does work re-start apache2
php_flag display_startup_errors on
php_flag display_errors on
php_flag html_errors on
</pre>

</body>
</html>
