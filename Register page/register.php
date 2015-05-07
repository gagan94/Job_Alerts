<!DOCTYPE html>
<HTML>
	<HEAD>
		<TITLE>Job Alerts - Register</TITLE>
		<SCRIPT SRC="Script-02.js"></SCRIPT>
		<link type="text/css" rel="stylesheet" href="Stylesheet-02.css" />
	</HEAD>
	<?php
		$first_name=$last_name=$mobile=$dob=$email=$c_email=$password=$c_password=$doj="";
		$first_name_err=$last_name_err=$mobile_err=$dob_err=$email_err=$c_email_err=$password_err=$c_password_err="";
		$flag_1=$flag_2=$flag_3=$flag_4=$flag_5=$flag_6=$flag_7=0;
		$con=$suc=0;
		$day=$month=$year=0;
		$myfile=$file_name=null;
		
		if($_SERVER['REQUEST_METHOD']=="POST")
		{
			if(empty($_POST['firstn']))
			{
				$first_name_err=" * Required field";
			}

			else
			{
				$first_name=test_input($_POST['firstn']);
				if(!preg_match("/^[a-zA-Z ]*$/",$first_name))
				{
					$first_name_err=" * Invalid first name";
				}
				else
				{
					$flag_1=1;
				}
			}
			
			if(empty($_POST['lastn']))
			{
				$last_name_err=" * Required field";
			}
			
			else
			{
				$last_name=test_input($_POST['lastn']);
				if(!preg_match("/^[a-zA-Z ]*$/",$last_name))
				{
					$last_name_err=" * Invalid last name";
				}
				else
				{
					$flag_2=1;
				}
			}
			
			if(empty($_POST['ph']))
			{
				$mobile_err=" * Required field";
			}
			
			else
			{
				$mobile=test_input($_POST['ph']);
				if(strlen($mobile)!=10)
				{
					$mobile_err=" * Invalid number";
				}
				else
				{
					$flag_3=1;
				}
			}
			
			if(empty($_POST['email']))
			{
				$email_err=" * Required field";
			}
			
			else
			{
				$email=test_input($_POST['email']);
				if(!preg_match("/([\w\-]+\@[\w\-]+\.[\w\-]+)/",$email))
				{
					$email_err=" * Invaid email id";
				}
				else
				{
					$flag_4=1;
				}
			}
			
			if(empty($_POST['c_email']))
			{
				$c_email_err=" * Required field";
			}
			
			else
			{
				$c_email=test_input($_POST['c_email']);
				if(!preg_match("/([\w\-]+\@[\w\-]+\.[\w\-]+)/",$c_email))
				{
					$c_email_err=" * Invalid email id";
				}
				else
				{
					if($c_email!=$email)
					{
						$c_email_err=" * Did not match";
					}
					else
					{
						$flag_5=1;
					}
				}
			}	
			
			if(empty($_POST['passwd']))
			{
				$password_err=" * Required field";
			}
			
			else
			{
				$password=test_input($_POST['passwd']);
				$flag_6=1;
			}
			
			if(empty($_POST['c_passwd']))
			{
				$c_password_err=" * Required field";
			}
			
			else
			{
				$c_password=test_input($_POST['c_passwd']);
				if($c_password==$password)
				{
					$flag_7=1;
				}
				else
				{
					$c_password_err=" * Did not match";
				}
			}
			
			$day=$_POST['d'];
			$month=$_POST['m'];
			$year=$_POST['y'];
						
			if($flag_1==1&&$flag_2==1&&$flag_3==1&&$flag_4==1&&$flag_5==1&&$flag_6==1&&$flag_7==1)
			{
				$con=mysqli_connect("localhost","root","7259387103","job_alerts");
				if($con)
				{
					$file_name=substr($email,0,strpos($email,'@')).".php";
					$dob=$year."-".$month."-".$day;
					$email="'".$email."'";
					$password="'".$password."'";
					$first_name="'".$first_name."'";
					$last_name="'".$last_name."'";
					$dob="'".$dob."'";
					$doj="'".date("y-m-j")."'";
					$suc=mysqli_query($con,"insert into user values($email,$password,$first_name,$last_name,$dob,$mobile,$doj);");
					
					if(!$suc)
					{
						$email_err=" * A user with this email id already exists";
					}
					else
					{
						fopen($file_name,"w");
						if(session_start())
						{
							$_SESSION['userid']=$email;
						}
						header("LOCATION: user-view.php");
					}
				}
				else
				{
					echo "Could not connect to database";
				}
			}
		}
		
		function test_input($var)
		{
			$var=trim($var);
			$var=stripslashes($var);
			$var=htmlspecialchars($var);
			
			return $var;
		}
	?>

	<BODY ONLOAD="get_dates()">
		<FORM action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method="post">
			<div id="page">
				<div id="page-content">
					<h1>Register</h1>
					First Name:<a class="error"><?php echo $first_name_err; ?></a><br/>
					<input type="textarea" name="firstn" maxlength=30 /><br/>

					Last Name:<a class="error"><?php echo $last_name_err; ?></a><br/>
					<input type="textarea" name="lastn"  maxlength=30/><br/>

					Mobile Number:<a class="error"><?php echo $mobile_err; ?></a><br/>
					<input type="textarea" name="ph" maxlength=10 /><br/>
	
					Date of Birth:<br/>
					<SELECT id="date" name="d"></SELECT>
					<SELECT id="month" name="m"></SELECT>
					<SELECT id="year" name="y"></SELECT><br/>

					Email Address:<a class="error"><?php echo $email_err; ?></a><br/>
					<input type="textarea" name="email" maxlength=30/><br/>

					Confirm Email Address:<a class="error"><?php echo $c_email_err; ?></a><br/>
					<input type="textarea" name="c_email" maxlength=30 /><br/>

					Enter Password:<a class="error"><?php echo $password_err; ?></a><br/>
					<input type="password" name="passwd" maxlength=30 /><br/>

					Confirm Password:<a class="error"><?php echo $c_password_err; ?></a><br/>
					<input type="password" name="c_passwd" maxlength=30 /><br/>
			
					<input id="button" type="submit" value="Create Profile"/>
				</div>
			</div>
		</FORM>
	</BODY>
</HTML>