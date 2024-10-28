<?php 
    include './dbhelper.php';
    $id = $_GET['id'];
    $field = 'depCode';
    $table = 'departments';
    $department = getrecord($table,$field,$id);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Management</title>
</head>
<body>
    <div class="center">
        <h1>Edit Dept.</h1>
        <form action="./controllers/deptController.php?action=update&id=<?php echo $id; ?>" method="POST">
            <label for="">Dept. Name</label>
            <input type="text" value="<?php echo $department['depName']?>" name="name"> <br>
            <label for="">Dept. Head</label>
            <input type="text" value="<?php echo $department['depHead']?>" name="head"><br>
            <label for="">Tel. No.</label>
            <input type="text" value="<?php echo $department['depTelNo']?>" name="telno"> <br>
            <button type="submit">Save Changes</button>
        </form>
        <a href="./deptmgmt.php">Back</a>
    </div>
</body>
</html>