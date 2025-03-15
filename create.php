<?php
include "config.php"; // Database connection

if(isset($_POST['submit'])){
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        
        // Get form data & prevent SQL Injection using prepared statements
        $ename = $_POST["ename"];
        $sname = $_POST["sname"];
        $topic = $_POST["topic"];
        $venue = $_POST["venue"];
        $sdate = $_POST["sdate"];
        $stime = $_POST["stime"];
        $etime = $_POST["etime"];

        // Use a prepared statement to safely insert data
        $q = $conn->prepare("INSERT INTO Register (Ename, Sname, Topic, Venue, sdate, stime, etime) 
                            VALUES (?, ?, ?, ?, ?, ?, ?)");
        $q->bind_param("sssssss", $ename, $sname, $topic, $venue, $sdate, $stime, $etime);

        // Execute query
        if($q->execute()){
            echo "Inserted successfully!";
        } else {
            echo "Error: " . $conn->error;
        }

        // Close statement
        $q->close();
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Event</title>
    <link rel="stylesheet" href="create.css">
</head>
<body>
    <h1 class="d">Organize An Event</h1>
    <form action="create_event.php" method="post"> <!-- Changed action to same file -->
        <table>
            <tr>
                <td>Name of the Event:</td>
                <td><input type="text" name="ename" required></td>
            </tr>
            <tr>
                <td>Name of the Speaker:</td>
                <td><input type="text" name="sname" required></td>
            </tr>
            <tr>
                <td>Topic:</td>
                <td><input type="text" name="topic" required></td>
            </tr>
            <tr>
                <td>Venue:</td>
                <td><input type="text" name="venue" required></td>
            </tr>
            <tr>
                <td>Date:</td>
                <td><input type="date" name="sdate" required></td>
            </tr>
            <tr>
                <td>Starting Time:</td>
                <td><input type="time" name="stime" required></td>
            </tr>
            <tr>
                <td>Ending Time:</td>
                <td><input type="time" name="etime" required></td>
            </tr>
            <tr>
                <td><input type="submit" name="submit" value="Submit"></td>
            </tr>
        </table>
    </form>
</body>
</html>
