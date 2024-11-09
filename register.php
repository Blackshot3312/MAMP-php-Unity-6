<?php
    $con = new mysqli('localhost', 'root', 'root', 'unitysql');

    // Check database connection
    if ($con->connect_error) {
        die("1: Connection failed: " . $con->connect_error); // Error 1, means connection failed
    }

    $username = $con->real_escape_string($_POST["name"]);
    $password = $_POST["password"];

    // Check for existing usernames
    $namecheckquery = "SELECT username FROM players WHERE username=?";
    $stmt = $con->prepare($namecheckquery);
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        echo "3: The username already exists";
        $stmt->close();
        $con->close();
        exit();
    }
    $stmt->close();

    // Add new user
    $salt = '$5$rounds=5000$' . 'stemedhams' . $username . '$';
    $hash = crypt($password, $salt);
    $insertuserquery = "INSERT INTO players (username, hash, salt) VALUES (?, ?, ?)";
    $stmt = $con->prepare($insertuserquery);
    $stmt->bind_param("sss", $username, $hash, $salt);

    if (!$stmt->execute()) {
        die("4: Failed to insert the user");
    }

    echo "0";

    $stmt->close();
    $con->close();
?>

