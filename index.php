<?php

/* It's better to define the empty variables outside so that HTML has access to them */
$name = "";
$required = "";
$sent = "";

if( isset($_POST['submit'])) {
	$name = $_POST['name'];    
	if(empty($_POST['name'])) { $required = "*Name required"; } 
	if(!preg_match("/^[a-zA-Z0-9 ]*$/",$name)) {
	    	    $required = "*Only letters and numbers allowed";
	        } else {
	        	$sent = "Your message has been posted"; }


function security($post) {
		$x = trim($post); 
		$x = stripslashes($x);
		$x = htmlspecialchars($x);  
		return $x;
	}


    $name = security($name);
    
}

?>


<html>
<head>
	<style>
	    #error {
	    	       color:red;
	    }    
    </style>
</head>
<body>

<form action="" method="POST" >
    Name: <input type="text" name="name" required><span id="error" ><?php echo $required; ?></span>
    <input type="submit" name="submit" value="Submit" >
</form>
<p><?php echo $sent ?></p>
</body>
</html>