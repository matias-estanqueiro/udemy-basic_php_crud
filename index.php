<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Newsletter</title>
</head>
<body style="width: 50vh; height: 90%; background-color: #f5f5f5; margin: 20px auto;">

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

        // Messages
        if(isset($_GET["message"])) {
            if($_GET["message"] == "delete") {
                echo "<p>Record deleted successfully</p>";
            }
        }

        if(isset($_GET["message"])) {
            if($_GET["message"] == "insert") {
                echo "<p>Record inserted successfully</p>";
            }
        }

        if(isset($_GET["message"])) {
            if($_GET["message"] == "update") {
                echo "<p>Record updated successfully</p>";
            }
        }
    ?>

    <h1>Newsletter</h1>
    <form action="register.php" method="post" style="display: flex; gap: 10px;">
        <div class="labels" style="width: 50%; display: flex; flex-direction: column; gap: 5px;">
            <label for="firstname">FirstName:</label>
            <label for="lastname">LastName:</label>
            <label for="email">Email:</label>
        </div>
        <div class="inputs" style="width: 50%; display: flex; flex-direction: column; gap: 5px;">
            <input type="text" name="firstname" id="firstname">
            <input type="text" name="lastname" id="lastname">
            <input type="email" name="email" id="email">
        </div>
        <input type="submit" value="Submit">
    </form>

    <div class="users_container">

    <?php
        // $sql = "SELECT id, firstname, lastname, email FROM users";
        // $result = $conn->query($sql);
        // if ($result->num_rows > 0) {
        
        // Prepared statement
        $query = $conn->prepare("SELECT id, firstname, lastname, email FROM users");
        $query->execute();
        $result = $query->get_result();
        if($result->num_rows > 0) {
            // output data of each row
            while($row = $result->fetch_assoc()) {
    ?>
                <div class="user" style="border : 1px solid black; margin: 10px 0; padding: 10px">
                    <p class="p_user" style="margin: 0; padding = 0;">ID: <?php echo $row["id"]; ?></p>
                    <p class="p_user" style="margin: 0; padding = 0;">First Name: <?php echo $row["firstname"]; ?></p>
                    <p class="p_user" style="margin: 0; padding = 0;">Last Name: <?php echo $row["lastname"]; ?></p>
                    <p class="p_user" style="margin: 0; padding = 0;">Email: <?php echo $row["email"]; ?></p>
                    <a href="delete.php?id=<?php echo $row["id"] ?>" style="display: flex">Delete</a>
                    <a href="update.php?id=<?php echo $row["id"] ?>" style="display: flex">Update</a>
                </div>
    </div>

    <?php
            }
        } else {
            echo "No records <hr>";
        }
        $conn->close();
    ?>

</body>
</html>