<?php 
    include './dbhelper.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Departments</title>
    <link rel="stylesheet" href="./styles.css">
</head>
<body>
    <div class="center">
        <div class="side-by-side">
            <a href="./deptadd.php">Add a department here</a> | <a href="./index.php">Back to Menu</a>
        </div>
        <br>
        <div>
            <?php
            if (isset($_GET['message'])){
                echo "<p>{$_GET['message']}</p>";
            }
            ?>
        </div>
        <div>
            <table border="1">
                <tr>
                    <th>Code</th>
                    <th>Name</th>
                    <th>Head</th>
                    <th>Tel. No.</th>
                    <th>Actions</th>
                </tr>
            <?php 

            $departments = getallrecord('departments');
            foreach($departments as $department){
                echo "<tr>";
                echo "<td>{$department['depCode']}</td>";                
                echo "<td>{$department['depName']}</td>";                
                echo "<td>{$department['depHead']}</td>";                
                echo "<td>{$department['depTelNo']}</td>";
                echo "<td>
                    <a href='./deptedit.php?id={$department['depCode']}'>Edit</a>
                    <a href='./controllers/deptController.php?action=delete&id={$department['depCode']}'>Delete</a>
                </td>";
                echo "</tr>";
            }
            ?>
            </table>
        </div>
    </div>
</body>
</html>