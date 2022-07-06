<!DOCTYPE html>
<html>
<head>
<script type = "text/javascript" >
    function preventBack(){window.history.forward();}
    setTimeout("preventBack()", 0);
    window.onunload=function(){null};
</script>

	<title>LOGIN</title>
	<link rel="stylesheet" type="text/css" href="style2.css">
</head>
<!-- <h1 style="margin-top:-5%"><u>INVOICING SYSTEM</u></h1> -->
<body style="margin-top:10%; background:#420303;">
    
    <h1>Sign In To Your Account</h1>
    <form action="login.php" method="post">

	 	<!-- DISPLAY ERROR MESSAGE -->
     	<?php if (isset($_GET['error'])) { ?> <p class="error"><?php echo $_GET['error']; ?></p> <?php } ?>

		<!-- TEXTBOXES -->
		<label>Email Address</label>
     	<input type="email" name="uname" placeholder="Email Address"><br>

		<label>Password</label>
     	<input type="password" name="password" placeholder="Password"><br>

		<!-- BUTTONS -->
     	<button type="submit">Sign In</button>
		<!-- <button type="submit" formaction="signup.php">Create An Account</button> -->
        <!-- <a href="forgot-password.php" class="ca">Forgot Password ?</a> -->
    </form>
</body>
</html>