

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body style="width: 50vh; height: 90%; background-color: #f5f5f5; margin: 20px auto;">>
    <?php
        $servername = "localhost";
        $username = "root";
        $password = "";
        $database = "newsletter";

        function val($data){
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }

        function update_user() {
            $servername = "localhost";
            $username = "root";
            $password = "";
            $database = "newsletter";

            $conn = new mysqli($servername, $username, $password, $database);
            // Check connection
            if($conn->connect_error) {
                die("Connection failed: $conn->connect_error");
            } else {
                echo "Connected successfully <hr>";
            };

            $n_id = val($_POST["id"]);
            $n_fname = val($_POST["firstname"]);
            $n_lname = val($_POST["lastname"]);
            $n_email = val($_POST["email"]);

            // Prepared statement
            $query = $conn->prepare("UPDATE users SET firstname=?, lastname=?, email=? WHERE id=?");
            // "sss" - string, string, string
            // "i" - integer
            $query->bind_param("sssi", $n_fname, $n_lname, $n_email, $n_id);
            $query->execute();
            // header : redirects to another page
            header("location:index.php?message=update");
            // Free result
            $query->close();
            // Close connection
            $conn->close();

            // $sql_update = "UPDATE users SET firstname='$n_fname', lastname='$n_lname', email='$n_email' WHERE id='$n_id'";
            // if($conn->query($sql_update) === TRUE) {
            //     header("location:index.php?message=update");
            // } else {
            //     echo "Error: " . $sql_update . "<br>" . $conn->error;
            // }
            // $conn->close();
        }

        // Create connection
        $conn = new mysqli($servername, $username, $password, $database);

        // Check connection
        if($conn->connect_error) {
            die("Connection failed: $conn->connect_error");
        } else {
            echo "Connected successfully <hr>";
        };

        $id = $_GET["id"];
        // Prepared statement
        $sql = "SELECT * FROM users WHERE id='$id'";
        $result = $conn->query($sql);
        if($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                $fname = $row["firstname"];
                $lname = $row["lastname"];
                $email = $row["email"];
            }
        } else {
            echo "0 results";
        }

        $conn->close();

        // Call the function when the form is submitted
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if(isset($_POST["submit"])) {
                update_user();
            }
        }
    ?>

    <form method="post" style="display: flex; gap: 10px;">
            <div class="labels" style="width: 50%; display: flex; flex-direction: column; gap: 5px;">
                <label for="firstname">FirstName:</label>
                <label for="lastname">LastName:</label>
                <label for="email">Email:</label>
            </div>
            <div class="inputs" style="width: 50%; display: flex; flex-direction: column; gap: 5px;">
                <input type="text" name="firstname" id="firstname" value="<?php echo $fname ?>" />
                <input type="text" name="lastname" id="lastname" value="<?php echo $lname ?>" />
                <input type="email" name="email" id="email" value="<?php echo $email ?>" />
                <input type="hidden" name="id" id="id" value="<?php echo $id ?>">
            </div>
            <input type="submit" name="submit" value="Submit">
        </form>
</body>
</html>