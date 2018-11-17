<?php
	require_once 'ConnectionFactory.php';
	try
	{
		$conn = ConnectionFactory::getFactory()->getConnection();
		$stmt = $conn->prepare("REPLACE into favorite(fid, logDate, type, userID)VALUES('".$_GET['tableID']."',now(), '".$_GET['table']."', '".$_GET['user']."')");
		$stmt->execute();			
		$conn = null;
	}
	catch (PDOException $e) 
	{
		echo "error".$e.message;
	}
?>