<?php 
    include './controllers/attController.php';
    include_once './dbhelper.php';

    $employees = getallrecord('employees');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Department</title>
    <link rel="stylesheet" href="./styles.css">
    <style>
        label {
            color: gray;
        }
    </style>
</head>
<body>
    <div class="center">
        <h1>Add Department</h1>
        <form method="POST" action="./controllers/attController.php?action=add" class="center">
            <label for="">Emp ID.</label> <br>
            <select name="empID" id="">
                
            <?php 
                foreach($employees as $employee){
                    echo "<option value='{$employee['empID']}'>".$employee['empFName']." ".$employee['empLName']."</option>";
                }
            ?>
            </select> <br>
            <label for="">Time In</label> <br>
            <input type="datetime-local" name="timein"> <br>
            <label for="">Time Out</label> <br>
            <input type="datetime-local" name="timeout"> <br>
            <button type="submit">Create</button>
        </form>
        <a href="./attRec.php">Back</a>
    </div>
</body>
</html>