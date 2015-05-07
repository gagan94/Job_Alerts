<!doctype html>
<?php 
	session_start();
	$con=mysqli_connect("localhost","root","root","job_alerts");
	//$jobs=" ";
	$no=0;
	
	if(array_key_exists('userid',$_SESSION))
	{
		$name="'".$_SESSION['userid']."'";
		$password=$_SESSION['password'];
		$res=mysqli_query($con,"select password from user where userid=$name");
		$ans=$res->fetch_array(MYSQLI_NUM);
		if($password!=$ans[0])
		{
			header("LOCATION:..");
		}
		else
		{
			$res=mysqli_query($con,"select fname,lname from user where userid=$name");
			$ans=$res->fetch_array(MYSQLI_NUM);
			$name=$ans[0]." ".$ans[1];
			if($_SESSION['rep']==0)
			{
				$_SESSION['loc_set']=0;
				$_SESSION['sec_set']="All";
				$_SESSION['sal_set']=0;
			}
			
			if(array_key_exists('sector',$_POST)||array_key_exists('sectors',$_POST))
			{
				if(array_key_exists('sector',$_POST))
				{
					$_SESSION['sec_set']=$_POST['sector'];
				}
				
				else
				{
					$_SESSION['sec_set']=$_POST['sectors'];
					echo $_POST['sectors'];
				}
				
				$_SESSION['rep']++;
			}
			
			if(array_key_exists('loc',$_POST)||array_key_exists('locs',$_POST))
			{
				if(array_key_exists('loc',$_POST))
				{
					$_SESSION['loc_set']=$_POST['loc'];
				}
				
				else
				{
					$_SESSION['loc_set']=$_POST['locs'];
				}
				
				$_SESSION['rep']++;
			}
			
			if($_SESSION['loc_set']!="All"&&$_SESSION['sec_set']!="All")
			{
				$ses=$_SESSION['sec_set'];
				$loc=$_SESSION['loc_set'];
				$query="select loc_name from location where loc_key=$loc";
				$jo=mysqli_query($con,$query);
				if($jo)
				{
					$loc=$jo->fetch_all(MYSQLI_NUM);
					$loc="'".$loc[0][0]."'";
					$sal=$_SESSION['sal_set'];
					$query="select v.post,c.companyname,v.salary,v.lastdate from vacancy v,company c where v.vacancyid=any(select vacancyid from vacancy_qual where courseid=402) and v.vacancyid=any(select vacancyid from vacancy_location where location=$loc) and v.salary>=200000 and v.vacancyid=any(select v.vacancyid from vacancy v,company c where c.sectorid=4) and c.companyid=v.companyid";
					$jo=mysqli_query($con,$query);
					if($jo)
					{
						$jobs=$jo->fetch_all(MYSQLI_NUM);
						$no=mysqli_num_rows($jo);
					}
				}
				else
				{
					echo "fuck this";
				}
			}
		}
	}
	else
	{
		header("LOCATION:..");
	}
?>
<html>
	<head>
		<title><?php echo $name ?></title>
		<link type="text/css" rel="stylesheet" href="base.css" />
		<link type="text/css" rel="stylesheet" href="user_style.css" />
		<SCRIPT SRC="Script-03.js"></SCRIPT>
		<script>
			function set()
			{
				myvar=<?php echo $_SESSION['loc_set'] ?>;
				var rad=document.getElementsByName("loc");
				for(var i=0;i<rad.length;i++)
				{	
					rad[i].checked=false;
				}
				var form=document.getElementById("locations");
				form.selectedIndex=myvar-4;
				alert(form.selectedIndex);
				alert(myvar);
			}
		</script>
	</head>
	<body action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>">
		<div class="header">Job Alerts</div>
		<div class="bar">
			<a class="bar_text" href="../logout.php">Logout</a>
		</div>
		<div class="left">
			<div class="left-content">
				</br></br><a class="big">Job Location</a></br></br>
				<form method="POST">
					<?php
						$res=mysqli_query($con,"select loc_name,loc_key from location order by views desc");
						$ans=$res->fetch_all(MYSQLI_NUM);
					?>
					<input class="selection" type="radio" name="loc" checked="checked" value="All"> All</input></br>
					<input onChange='this.form.submit()' class='selection' type='radio' name='loc' value=<?php echo $ans[0][1]?> <?php if($_SESSION['loc_set']==$ans[0][1]) echo "checked=checked"?>>
						<?php echo $ans[0][0]?>
					</input></br>
					<input onChange='this.form.submit()' class='selection' type='radio' name='loc' value=<?php echo $ans[1][1]?> <?php if($_SESSION['loc_set']==$ans[1][1]) echo "checked=checked"?>>
						<?php echo $ans[1][0]?>
					</input></br>
					<input onChange='this.form.submit()' class='selection' type='radio' name='loc' value=<?php echo $ans[2][1]?> <?php if($_SESSION['loc_set']==$ans[2][1]) echo "checked=checked"?>>
						<?php echo $ans[2][0]?>
					</input></br>
					<input onChange='this.form.submit()' class='selection' type='radio' name='loc' value=<?php echo $ans[3][1]?> <?php if($_SESSION['loc_set']==$ans[3][1]) echo "checked=checked"?>>
						<?php echo $ans[3][0]?>
					</input></br>
					<select id="locations" name="locs" onChange="drop_1()">
						<option value=100>More Cities</option>
						<?php
							for($i=4;$i<count($ans);$i++)
							{
								echo "<option value=$i><a class='drop_text'>";
								echo $ans[$i][0];
								echo "</a></option>";
								if($_SESSION['loc_set']==$i)
								{
									echo '<script>set()</script>';
								}
							}
						?>
					</select>
				</form>
				</br></br></br><a class="big">Sector</a></br></br>
				<form method="POST">
					<?php
						if($con)
						{
							$res_1=mysqli_query($con,"select sectorname,sectorid from sector order by views desc");
							$ans=$res_1->fetch_all(MYSQLI_NUM);
						}
					?>
					<input class="selection" type="radio" name="sector" checked="checked" value=0> All</input></br>
					<input onChange="this.form.submit()" class="selection" type="radio" name="sector" value=<?php echo $ans[0][1]; ?> <?php if($_SESSION['sec_set']==$ans[0][1]) echo "checked=checked"?>>
						<?php
							echo $ans[0][0];
						?>
					</input></br>
					<input onChange="this.form.submit()" class="selection" type="radio" name="sector" value=<?php echo $ans[1][1]; ?> <?php if($_SESSION['sec_set']==$ans[1][1]) echo "checked=checked"?>>
						<?php
							echo $ans[1][0];
						?>
					</input></br>
					<input onChange="this.form.submit()" class="selection" type="radio" name="sector" value=<?php echo $ans[2][1]; ?> <?php if($_SESSION['sec_set']==$ans[2][1]) echo "checked=checked"?>>
						<?php
							echo $ans[2][0];
						?>
					</input></br>
					<input onChange="this.form.submit()" class="selection" type="radio" name="sector" value=<?php echo $ans[3][1]; ?> <?php if($_SESSION['sec_set']==$ans[3][1]) echo "checked=checked"?>>
						<?php
							echo $ans[3][0];
						?>
					</input></br>
					<select id="sectors">
						<option value=100>More Sectors</option>
						<?php
							for($i=4;$i<count($ans);$i++)
							{
								echo "<option value="."'".$ans[$i][1]."'>";
								echo $ans[$i][0];
								echo "</option>";
								if($_SESSION['sec_set']==$ans[$i][1])
								{
									echo "fuck";
									set($i-4);
								}
							}
						?>
					</select></br></br></br></br>
				</form>
				<div class="salary">
				<form>
					<a class="big">Salary</a></br></br>
					<input class="selection" type="radio" name="sal" checked="checked"> Any</input></br>
					<input class="selection" type="radio" name="sal"> &#8377 10,000+</input></br>
					<input class="selection" type="radio" name="sal"> &#8377 25,000+</input></br>
					<input class="selection" type="radio" name="sal"> &#8377 50,000+</input></br>
					<input class="selection" type="radio" name="sal"> &#8377 100,000+</input></br>
				</form>
				</div>
			</div>
		</div>
		<div class="page">
			<div class="qual">
				<a class="big">Qualification</a></br></br>
				<SELECT ONCHANGE="get_courses(this)" class="qual_type">
					<OPTION VALUE="0">Select qualification type</OPTION>
					<OPTION VALUE="1">High School</OPTION>
					<OPTION VALUE="2">Diploma</OPTION>
					<OPTION VALUE="3">Undergraduate</OPTION>
					<OPTION VALUE="4">Post Graduate</OPTION>
				</SELECT>
				<SELECT id="courses" ONCHANGE="get_branches(this)"></SELECT>
				<SELECT id="branch" ONCHANGE="get_values(this)"></SELECT>
			</div>
			<div class="results">
				<?php
					for($i=0;$i<$no;$i++)
					{
						for($j=0;$j<4;$j++)
						{
							echo $jobs[$i][$j]." ";
						}
						echo "</br>";
					}
				?>
			</div>
		</div>
		<div class="right"></div>
		<div class="footer"></div>
	</body>
</html>
	