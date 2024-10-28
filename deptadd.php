<?php 
    include './controllers/deptController.php';
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
        <form method="POST" action="./controllers/deptController.php?action=add">
            <label for="">Name</label> <br>
            <input type="text" name="name"><br>
            <label for="">Head</label> <br>
            <input type="text" name="head"> <br>
            <label for="">Tel No</label> <br>
            <input type="text" name="telno"> <br>
            <button type="submit">Create</button>
        </form>
        <a href="./deptmgmt.php">Back</a>
    </div>
</body>
</html>