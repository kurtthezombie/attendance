<?php

//database abstraction
$hostname = "localhost";
$username = "root";
$password = "";
$database = "attendance";
$conn;
//

function connect () {
	global $hostname, $username, $password, $database, $conn;
	$conn = mysqli_connect($hostname,$username,$password,$database) or die("Connection error...");
}

function disconnect(){
	global $conn;
	mysqli_close($conn);
}

function getallrecord($table){
	global $conn;
	$sql = "SELECT * FROM `$table`";
	connect();
	$query = mysqli_query($conn,$sql);
	$rows = mysqli_fetch_all($query,MYSQLI_ASSOC);
	disconnect();
	return $rows;
}

function getrecord($table,$field,$id){
	global $conn;
	$sql = "SELECT * FROM `$table` WHERE `$field` = '$id'";
	connect();
	$query = mysqli_query($conn,$sql);
	$rows = mysqli_fetch_assoc($query);
	disconnect();
	if (!count($rows)){
		return false;
	}
	return $rows;
}

function deleterecord($table,$field,$id){
	global $conn;
	$sql = "DELETE FROM `$table` where `$field` = '$id'";
	connect();
	$query = mysqli_query($conn,$sql);
	disconnect();
	return true;
}

function addrecord($table,$fields,$data){
	global $conn;

	if (!count($fields)== count($data)) {
		echo "Field and data size are not equal";
		return false;
	}

	$dbfields = implode("`,`",$fields);
	$dbdata = implode("','",$data);
	$sql = "INSERT INTO `$table` (`$dbfields`) VALUES ('$dbdata')";
	connect();
	$query = mysqli_query($conn,$sql);
	disconnect();
	return true;
}

function updaterecord($table,$fields,$data){
	global $conn;
	$flds = array();
	//make sure both arrays have equal sizes
	if(!(count($fields) == count($data))){
		echo "Fields and Data Size are not equal";
		return false;
	}

	for($i=1;$i<count($fields);$i++){
		$flds[]="`".$fields[$i]."`='".$data[$i]."'";
	}


	$fld = implode(",",$flds);
	$sql = "UPDATE `$table` SET $fld WHERE `$fields[0]` = '$data[0]'";
	connect();
	$query = mysqli_query($conn,$sql);
	disconnect();
	return true;
}
