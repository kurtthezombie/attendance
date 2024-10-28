<?php 
    include 'dbhelper.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employee Management</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="center">
        <div class="side-by-side">
        <a href="./empadd.php">Add an employee here</a> | <a href="./index.php">Back to Menu</a>
        </div>
        <div>
            <?php
            if (isset($_GET['message'])){
                echo "<p>{$_GET['message']}</p>";
            }
            ?>
        </div>
        <br>
        <div>
            <table border="1">
                <tr>
                    <th>ID</th>
                    <th>Dept</th>
                    <th>Lastname</th>
                    <th>Firstname</th>
                    <th>Rate/Hour</th>
                    <th>Actions</th>
                </tr>
            <?php 

            $employees = getallrecord('employees');
            foreach($employees as $employee){
                echo "<tr>";
                echo "<td>{$employee['empID']}</td>";                
                echo "<td>{$employee['depCode']}</td>";                
                echo "<td>{$employee['empLName']}</td>";                
                echo "<td>{$employee['empFName']}</td>";
                echo "<td>{$employee['empRPH']}</td>";
                echo "<td>
                    <a href='./empedit.php?id={$employee['empID']}'>Edit</a>
                    <a href='./controllers/empController.php?action=delete&id={$employee['empID']}'>Delete</a>
                </td>";
                echo "</tr>";
            }
            ?>
            </table>
        </div>
    </div>
</body>
</html>