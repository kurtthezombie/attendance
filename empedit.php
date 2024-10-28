<?php 
    include './controllers/empController.php';

    $departments = getallrecord('departments');
    $id = $_GET['id'];
    $field = 'empID';
    $table = 'employees';
    $employee = getrecord($table,$field,$id);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Department</title>
    <style>
        label {
            color: gray;
        }
    </style>
</head>
<body>
    <div class="center">
        <h1>Edit Department</h1>
        <form method="POST" action="./controllers/empController.php?action=update&id=<?php echo $id ?>">
            <label for="">depCode</label> <br>
            <select name="depCode">
                
            <?php 
            foreach($departments as $department){
                $selected = ($department['depCode'] === $employee['depCode']) ? 'selected' : '';
                echo "<option value='{$department['depCode']}' $selected>{$department['depName']}</option>";
            }
            ?>
            </select> <br>
            <label for="">First Name</label> <br>
            <input type="text" name="fname" value="<?php echo $employee['empFName'] ?>"> <br>
            <label for="">Lastname</label> <br>
            <input type="text" name="lname"  value="<?php echo $employee['empLName'] ?>"> <br>
            <label for="">Rate per hour</label> <br>
            <input type="text" name="rph"  value="<?php echo $employee['empRPH'] ?>"> <br>
            <button type="submit">Save Changes</button>
        </form>
        <a href="./empmgmt.php">Back</a>
    </div>
</body>
</html>