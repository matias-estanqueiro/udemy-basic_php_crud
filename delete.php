<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "newsletter";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    } 

    $id = $_GET["id"];

    // Prepared statement
    $query = $conn->prepare("DELETE FROM users WHERE id=?");
    // "i" - integer
    $query->bind_param("i", $id);
    $query->execute();
    // header : redirects to another page
    header("location:index.php?message=delete");
    // Free result
    $query->close();
    // Close connection
    $conn->close();

    // SQL query to delete a record
    // $sql = "DELETE FROM users WHERE id='$id'";

    // if ($conn->query($sql) === TRUE) {
    //     // header : redirects to another page
    //     header("location:index.php?message=delete");
    // } else {
    //     echo "Error deleting record: " . $conn->error;
    // }

    // Close connection
    $conn->close();
?>