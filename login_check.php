	  
<?php
session_start();

   
$servername = "localhost";
$username = "root";
$password = "";

try {
    $conn = new PDO("mysql:host=$servername;dbname=ashish", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Connected successfully <br>"; 
	$lid = $_POST['t1'];
	$pss = $_POST['t2'];
	$sql = "select * from users where loginid=? and password=?";
	$rs = $conn->prepare($sql);
	$rs->execute(array($lid,$pss));
	$re = $rs->fetchAll();
	$unm = $re[0]['username'];		  
	 if(count($re)==1)
	 {
		if( isset( $_SESSION['ses_usnm'] ) )
         {
         $unm = $_SESSION['ses_usnm'] ;		 
         }
         else
         {
	       $_SESSION['ses_usnm']= $unm;
		   $_SESSION['ses_counter']=0;
		   $_SESSION['ses_score']=0;
		   $_SESSION['ses_wans']="";
		   $_SESSION['ses_lid']=$lid;
         }
		 header('Location: http://localhost/html/Quiz/startquiz.php');
	 }
	 else
	 {
		echo "Error Logging in";
	 }
     }
catch(PDOException $e)
    {
    echo "Connection failed: " . $e->getMessage();
    }
?>