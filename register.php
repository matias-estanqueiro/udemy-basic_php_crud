<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "newsletter";

    $fname = val($_POST["firstname"]);
    $lname = val($_POST["lastname"]);
    $email = val($_POST["email"]);

    function val($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    // Create connection - Non-prepared Insert data
    // $conn = mysqli_connect($servername, $username, $password, $database);

    // Create connection - Prepared statement
    $conn = new mysqli($servername, $username, $password, $database);

    
    // Check connection
    if($conn->connect_error) {
        die("Connection failed: $conn->connect_error");
    } else {
        echo "Connected successfully <hr>";
    };
    
    // Insert data
    // $sql = "INSERT INTO users (firstname, lastname, email) VALUES ('$fname', '$lname', '$email')";
    // Execute query
    // if($conn->query($sql) === TRUE) {
        //     $last_id = $conn->insert_id;
        //     echo "New record created successfully. Record ID is: $last_id <hr>";
        // } else {
        //     echo "Error: " . $sql . "<br>" . $conn->error;
    // }

    // Prepared statement
    $query = $conn->prepare("INSERT INTO users (firstname, lastname, email) VALUES (?, ?, ?)");
    // "sss" - string, string, string
    $query->bind_param("sss", $fname, $lname, $email);
    $query->execute();
    // header : redirects to another page
    header("location:index.php?message=insert");

    // Free result
    $query->close();
    
    // Close connection
    $conn->close();
?>