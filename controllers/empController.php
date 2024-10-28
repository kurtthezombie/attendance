<?php 

include __DIR__ . "/../dbhelper.php";

$table = "employees";

if (isset($_GET['action']) && $_GET['action'] === 'add'){
    global $table;
    $depcode = $_POST['depCode'];
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $rph = $_POST['rph'];

    $fields = array('depCode','empFName','empLName','empRPH');
    $data = array($depcode,$fname,$lname,$rph);
    $added = addrecord($table,$fields,$data);

    if(!$added) {
        $message = "Unsuccesful add";
    } else {
        $message = "Insertion successful";
    }

    header("Location: ../empmgmt.php?message=$message");
    exit();
}

if (isset($_GET['action']) && $_GET['action'] === 'update'){
    global $table;
    $id = $_GET['id'];
    $depcode = $_POST['depCode'];
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $rph = $_POST['rph'];

    $fields = array('empID','depCode','empFName','empLName','empRPH');
    $data = array($id,$depcode,$fname,$lname,$rph);
    $edited = updaterecord($table,$fields,$data);

    if(!$edited) {
        $message = "UNSUCCESSFUL UPDATE";
    } else {
        $message = "EMPLOYEE SUCCESSFULLY UPDATED";

    }
    header ("Location: ../empmgmt.php?message=$message");
    exit();
}

if (isset($_GET['action']) && $_GET['action'] === 'delete'){
    global $table;
    $result = deleterecord($table,'empID',$_GET['id']);
    
    if(!$result) {
        $message = "DELETION FAILED";
    }
    else {
        $message = "DELETION SUCCESSFUL";
    }
    header("Location: ../empmgmt.php?message=$message");
    exit();
}