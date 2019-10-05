<? php
session_start();
$creatorId=$_SESSION['emailId'];
$eventId=$_POST['eventId'];
$ngoName=$_POST['ngoName'];
$eventDesc=$_POST['eventDesc'];
$budget=$_POST['budget'];
$conn=new mysqli('localhost','root','','funds');
if($conn->connect_error)
{
	die('Connection Failed : '.$conn->connect_error);
}
else
{
	$stmt=$conn->prepare("insert into createevent(creatorId,eventId,ngoName,eventDesc,budget) values(?,?,?,?,?)");
	$stmt->bind_param("ssssi",$creatorId,$eventId,$ngoName,$eventDesc,$budget);
	$stmt->execute();
	echo "successful submission";
}
?>
