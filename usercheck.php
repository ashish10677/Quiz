<?php
	$servername = "localhost";
	$username = "root";
	$password = "";

	try {
		$conn = new PDO("mysql:host=$servername;dbname=ashish", $username, $password);
		// set the PDO error mode to exception
		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		//echo "Connected successfully <br>"; 
		$uid = $_GET['unm'];
		$unm = $_GET['nm'];
		$gen = $_GET['sx'];
		$em = $_GET['em'];
		$sql = "select count(*) 're' from users where loginid = '".$uid."'";
		//echo $sql;
		$rs = $conn->query($sql);
		$row = $rs->fetch(PDO::FETCH_BOTH);
		$c = $row[0];
		//echo $c;
		echo'<script type="text/javascript">
			function passcheck(){
				if(document.qfrm.pass.value==document.qfrm.cpass.value)
					return true;
				else{
					alert("Passwords Do not match");
					return false;
				}
			}
			function usercheck(){
				window.location="http://localhost/html/Quiz/usercheck.php?unm="+document.qfrm.unm.value+"&nm="+document.qfrm.nm.value+"&sx="+document.qfrm.sx.value+"&em="+document.qfrm.em.value;
			}
		</script>
		<style rel="stylesheet">
			body{
				background-image: url("Governance-quiz-2017-banner.jpg");
				background-repeat: no-repeat;
				background-size: 100%;
			}
			#tbl{
				position:fixed;
				right:10%;
				top:230px;
				background-color:#fff8dc;
				border-style: groove;
				border-color: #838b8b;
				border-width: 7px;
				text-align: justify;
				padding: 40px 40px 40px 40px;
				font-size:24px;
				text-shadow: 0.8px 0.8px 1.8px #8b7355;
			}
			h1{
				position:fixed;
				right:14%;
				top:10%;
				font-size: 80px;
				color: #303030;
				text-shadow: 2px 2px 5px #8b7355;
			}
			input[type=submit],[type=reset],[type=button]{
				font-size:20px;
				text-shadow: 2px 2px 5px #878787;
			}
		</style>';
		if($c==1){
			echo'<body>
				 <h1 align="center">Registration</h1>
				 <table align="center" cellpadding="7" id="tbl">
				 <form method="POST" name="qfrm" action="http://localhost/html/Quiz/register.php">
				 <tr><td>Name</td><td><input type="text" name="nm" value='.$unm.' required /></td></tr>';
				 if ($gen=='m')
				 {
				   echo '<tr><td>Gender</td><td>Male<input type="radio" name="sx" value="m" required checked />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Female<input type="radio" name="sx" value="f" required /></td></tr>';
					 
				 }
				 if ($gen=='f')
				 {
				   echo '<tr><td>Gender</td><td>Male<input type="radio" name="sx" value="m" required />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Female<input type="radio" name="sx" value="f" required checked /></td></tr>';
				 }
				 echo '
				 <tr><td>Email ID</td><td><input type="email" name="em" value='.$em.' ></td></tr>
				 <tr><td>User ID</td><td><input type="text" name="unm" required />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="submit" value="Check" onclick="usercheck();" /></td><td>User Id already exists</td></tr>
				 <tr><td>Password</td><td><input type="password" name="pass" required /></td></tr>
				 <tr><td>Retype Password</td><td><input type="password" name="cpass" required /></td></tr>
				 <tr><td></td><td><input type="submit" value="Submit" onclick="return passcheck();" />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="reset" value="Clear" /></td></tr>
				 </form>
				 </table>
				</body>';
		}
		else{
			echo'<body>
				 <h1 align="center">Registration</h1>
				 <table align="center" cellpadding="7" id="tbl">
				 <form method="POST" name="qfrm" action="http://localhost/html/Quiz/register.php">
				 <tr><td>Name</td><td><input type="text" name="nm" value='.$unm.' required /></td></tr>';
				 if ($gen=='m')
				 {
				   echo '<tr><td>Gender</td><td>Male<input type="radio" name="sx" value="m" required checked />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Female<input type="radio" name="sx" value="f" required /></td></tr>';
					 
				 }
				 if ($gen=='f')
				 {
				   echo '<tr><td>Gender</td><td>Male<input type="radio" name="sx" value="m" required />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Female<input type="radio" name="sx" value="f" required checked /></td></tr>';
				 }
				 echo '
				 <tr><td>Email ID</td><td><input type="email" name="em" value='.$em.' ></td></tr>
				 <tr><td>User ID</td><td><input type="text" name="unm" value='.$uid.' required /></td></tr>
				 <tr><td>Password</td><td><input type="password" name="pass" required autofocus/></td></tr>
				 <tr><td>Retype Password</td><td><input type="password" name="cpass" required /></td></tr>
				 <tr><td></td><td><input type="submit" value="Submit" onclick="return passcheck();" />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="reset" value="Clear" /></td></tr>
				 </form>
				 </table>
				</body>';
		}
	 }
catch(PDOException $e)
    {
    echo "Connection failed: " . $e->getMessage();
    }
?>