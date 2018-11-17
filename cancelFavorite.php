<?php
	require_once 'ConnectionFactory.php';
	try
	{
		$conn = ConnectionFactory::getFactory()->getConnection();
		//$stmt = $conn->prepare("delete from favorite where type='".$_GET['table']."' and user ='".$_GET['user']."' and fid ='".$_GET['tableID']."'" );
		$query = "delete from favorite where type='".$_GET['table']."' and userID ='".$_GET['user']."' and fid = '".$_GET['tableID']."'";
		$stmt = $conn->prepare($query);
		
		$stmt->execute();			
		$conn = null;
	}
	catch (PDOException $e) 
	{
		echo "error".$e.message;
	}
?>