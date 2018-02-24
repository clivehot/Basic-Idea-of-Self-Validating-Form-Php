<?php

/* It's better to define the empty variables outside so that HTML has access to them */
$name = "";
$required = "";$emailErr = "";
$sent = "";

if( isset($_POST['submit'])) {
     function security($post) {
		$x = trim($post); 
		$x = stripslashes($x);
		$x = htmlspecialchars($x);  
		return $x;
	}

	/* 	If form is submitted $name becomes the name that is submitted */
	$name = $_POST['name'];
    if(!preg_match("/^[a-zA-Z0-9 ]*$/",$name)) {
	    $required = "*Only letters and numbers allowed";
	} 
    
    $email =$_POST['email'];
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $emailErr = "Invalid email format"; 
    }

    /* Inserts $name into the security function prevents hacking*/
    $name = security($name);
    $email = security($email); 
    echo $name;
    
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
    Email: <input type="text" name="email" required><span id="error" ><?php echo $emailErr; ?></span>
    <input type="submit" name="submit" value="Submit" >
</form>
<p><?php echo $sent ?></p>

</body>
</html>