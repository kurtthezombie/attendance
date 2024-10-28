<?php 
    include './dbhelper.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recording</title>
    <link rel="stylesheet" href="./styles.css">
</head>
<body>
<div class="center">
        <div class="side-by-side">
        <a href="./attRecadd.php">Record attendance here</a> | <a href="./index.php">Back to Menu</a>
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
                    <th>Record #</th>
                    <th>Emp. ID</th>
                    <th>Date/Time In</th>
                    <th>Date/Time Out</th>
                    <th>Action</th>
                </tr>
            <?php 

            $records = getallrecord('attendance');
            foreach($records as $record){
                if ($record['attStat']==='not'){
                    echo "<tr>";
                    echo "<td>{$record['attRN']}</td>";                
                    echo "<td>{$record['empID']}</td>";                
                    echo "<td>".$record['attDate'] ." ". $record['attTimeIn']."</td>";                
                    echo "<td>".$record['attDate'] ." ". $record['attTimeOut']."</td>";                   
                    if ($record['attStat'])
                    echo "<td>
                        <a href='./controllers/attController.php?action=cancel&id={$record['attRN']}'>Cancel</a>
                    </td>";
                    echo "</tr>";
                }
            }
            ?>
            </table>
        </div>
    </div>
</body>
</html>