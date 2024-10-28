<?php 

include __DIR__ . '/../dbhelper.php';

$table = "attendance";

if (isset($_GET['action']) && $_GET['action'] === 'add'){
    global $table;
    $emp = $_POST['empID'];
    $date = date('Y-m-d');
    $timeIn = $_POST['timein'];
    $timeOut = $_POST['timeout'];
    $status = "not";

    $fields = array('empID','attDate','attTimeIn','attTimeOut','attStat');
    $data = array($emp,$date,$timeIn,$timeOut,$status);
    $added = addrecord($table,$fields,$data);

    if(!$added) {
        $message = "Unsuccesful add";
    } else {
        $message = "Insertion successful";
    }

    header("Location: ../attRec.php?message=$message");
    exit();
}

if (isset($_GET['action']) && $_GET['action'] === 'cancel'){
    global $table;
    $id = $_GET['id'];
    $status = "cancelled";

    $fields = array('attRN','attStat');
    $data = array($id,$status);
    $edited = updaterecord($table,$fields,$data);

    if(!$edited) {
        $message = "UNSUCCESSFUL UPDATE";
    } else {
        $message = "EMPLOYEE SUCCESSFULLY UPDATED";

    }
    header ("Location: ../attRec.php?message=$message");
    exit();
}
