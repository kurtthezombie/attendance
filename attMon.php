<?php 
    include './dbhelper.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Monitoring</title>
    <link rel="stylesheet" href="./styles.css">
</head>
<body>
<div class="center">
        <div class="side-by-side">
            <form action="" method="POST">
                <label for="">Input Employee #:</label>
                <input type="text" name="empId">
                <button type="submit" name="searchBtn">Search</button>
            </form>  | <a href="./index.php">Back to Menu</a>
        </div>
        <div>
        <?php 
            global $conn;
            if (isset($_POST['searchBtn'])){
                $empID = $_POST['empId'];
                $sql = "SELECT 
                            e.empFName,
                            e.empLName,
                            e.empRPH,
                            d.depName as department
                        FROM employees e
                        INNER JOIN
                            departments d ON e.depCode = d.depCode
                        WHERE e.empID ='$empID';
                            ";
                connect();
                $query = mysqli_query($conn,$sql);
                $row = mysqli_fetch_assoc($query);
                $rph = $row['empRPH'];
                echo "<div class='side-by-side'>";
                echo "<p>Name:<u>".$row['empLName']. " " .$row['empFName']."</u></p>";
                echo "<p>Department: <u>".$row['department']."</u></p>";
                echo "</div>"; 
                disconnect();
                $sql = "
                    SELECT 
                        attRN, empID,attTimeIn,attTimeOut,
                        TIMESTAMPDIFF(HOUR, attTimeIn, attTimeOut) AS totalHours
                    FROM attendance 
                    WHERE empID = $empID
                    AND attStat != 'cancelled';
                ";
                connect();
                $sumTotalHours = 0;
                $query = mysqli_query($conn,$sql);
                $row = mysqli_fetch_all($query, MYSQLI_ASSOC);
                echo "<table border='1'>";
                echo "<tr>";
                echo "<th>Record #</th>";
                echo "<th>Emp. ID</th>";
                echo "<th>Date/Time In</th>";
                echo "<th>Date/Time Out</th>";
                echo "<th>Total</th>";
                echo "</tr>";
                foreach($row as $record){
                    echo "<td>".$record['attRN']."</td>";
                    echo "<td>".$record['empID']."</td>";
                    echo "<td>".$record['attTimeIn']."</td>";
                    echo "<td>".$record['attTimeOut']."</td>";
                    echo "<td>".$record['totalHours']."</td>";
                    $sumTotalHours += $record['totalHours'];
                }
                echo "</table>";
                $salary = $rph * $sumTotalHours;
                $date = date('m-d-Y');
                echo "<div class='side-by-side'>";
                echo "<p>Rate per hour: $rph</p>";
                echo "<p>Total Hours Worked: $sumTotalHours</p>";
                echo "<p>Salary: $salary</p>";
                echo "<p>Date generated: $date</p>";
                echo "</div>";
            }
        ?>
        </div>
        
        <br>
    </div>
    
</body>
</html>