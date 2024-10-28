<?php 

include __DIR__ . '/../dbhelper.php';

$table = 'departments';

if (isset($_GET['action']) && $_GET['action'] === 'delete'){
    global $table;
    $result = deleterecord($table,'depCode',$_GET['id']);
    
    if(!$result) {
        $message = "DELETION FAILED";
    }
    else {
        $message = "DELETION SUCCESSFUL";
    }
    header("Location: ../deptmgmt.php?message=$message");
    exit();
}

if (isset($_GET['action']) && $_GET['action'] === 'update'){
    global $table;
    $id = $_GET['id'];
    $name = $_POST['name'];
    $head = $_POST['head'];
    $telno = $_POST['telno'];

    $fields = array('depCode','depName','depHead','depTelNo');
    $data = array($id,$name,$head,$telno);
    $edited = updaterecord($table,$fields,$data);

    if(!$edited) {
        $message = "UNSUCCESSFUL UPDATE";
    } else {
        $message = "DEPT. SUCCESSFULLY UPDATED";

    }
    header ("Location: ../deptmgmt.php?message=$message");
    exit();
}

if (isset($_GET['action']) && $_GET['action'] === 'add'){
    global $table;
    $id = $_POST['id'];
    $name = $_POST['name'];
    $head = $_POST['head'];
    $telno = $_POST['telno'];

    $fields = array('depName','depHead','depTelNo');
    $data = array($name,$head,$telno);
    $added = addrecord($table,$fields,$data);

    if(!$added) {
        $message = "Unsuccesful add";
    } else {
        $message = "Insertion successful";
    }

    header("Location: ../deptmgmt.php?message=$message");
    exit();
}
