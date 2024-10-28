<?php 
    include './controllers/empController.php';

    $departments = getallrecord('departments');
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Department</title>
    <style>
        label {
            color: gray;
        }
    </style>
</head>
<body>
    <div class="center">
        <h1>Add Department</h1>
        <form method="POST" action="./controllers/empController.php?action=add">
            <label for="">depCode</label> <br>
            <select name="depCode">
                
            <?php 
            foreach($departments as $department)
            echo "<option value='{$department['depCode']}'>{$department['depName']}</option>";
            ?>
            </select> <br>
            <label for="">First Name</label> <br>
            <input type="text" name="fname"> <br>
            <label for="">Lastname</label> <br>
            <input type="text" name="lname"> <br>
            <label for="">Rate per hour</label> <br>
            <input type="text" name="rph"> <br>
            <button type="submit">Create</button>
        </form>
        <a href="./empmgmt.php">Back</a>
    </div>
</body>
</html>