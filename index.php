<!DOCTYPE HTML>
<?php
	$email_err="";
	session_start();
	
	if(array_key_exists('userid',$_SESSION))
	{
		header('LOCATION: register page/user-view.php');
	}
	
	if($_SERVER['REQUEST_METHOD']=="POST")
	{
		$name="'".$_POST['name']."'";
		$password=$_POST['passwd'];
		$con=mysqli_connect("localhost","root","root","job_alerts");
		if($con)
		{
			$res=mysqli_query($con,"select password from user where userid=$name");
			$ans=$res->fetch_array(MYSQLI_NUM);
			if($password==$ans[0])
			{
				$_SESSION['userid']=$_POST['name'];
				$_SESSION['password']=$_POST['passwd'];
				$_SESSION['rep']=0;
				header("LOCATION:register page/user-view.php");
			}
			else
			{
				$email_err="* The Email/Password you entered is incorrect";
			}
		}
	}
?>

<HTML>
	<HEAD>
		<TITLE>Job Alerts - Login</TITLE>
		<LINK TYPE="TEXT/CSS" REL="STYLESHEET" HREF="STYLESHEET-01.CSS" />
		<SCRIPT SRC="Script-01.js"></script>
	</HEAD>

	<BODY>
		<h1>JOB ALERTS</h1>
		<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method="post">
			<input id="first" type="textarea" name="name" value="Email" maxlength=30 onclick="empty(this)">
			<input type="password" name="passwd"  value="Password" maxlength=30 onclick="empty(this)">
			<input id="button" type="submit" value="SIGN IN"/>
			<a class="error"><?php echo $email_err ?></a></br>
			<a class="p">NEW MEMBER <a href="register page/register.php">REGISTER HERE</a></a>
		</form>
	</BODY>
</HTML>