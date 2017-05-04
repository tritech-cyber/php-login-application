<?php

	require_once("session.php");
	require_once("class.user.php");
	$auth_user = new USER();
	
	
	$user_id = $_SESSION['user_session'];
	
	$stmt = $auth_user->runQuery("SELECT * FROM users WHERE user_id=:user_id");
	$stmt->execute(array(":user_id"=>$user_id));
	
	$userRow=$stmt->fetch(PDO::FETCH_ASSOC);

?>
<html>
<head>
<title>welcome - <?php print($userRow['user_email']); ?></title>
</head>

<body>

Greetings <?php echo $userRow['user_email']; ?>&nbsp;
<hr />
               <a href="profile.php">View Profile</a>
				<a href="logout.php?logout=true">Sign Out</a>
<hr />
    
    	<label>welcome : <?php print($userRow['user_name']); ?></label>
        <hr />
        
        <h1>
        <a href="home.php">home</a> &nbsp; 
        <a href="profile.php">profile</a>
        </h1>
       	<hr />
        
        <pUser Home Page</p> 
       
     

</body>
</html>
