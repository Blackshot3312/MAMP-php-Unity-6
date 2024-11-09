<?php
    $con = new mysqli('localhost', 'root', 'root', 'unitysql');

    // Checar conexão com o banco de dados
    if ($con->connect_error) {
        die("1: Connection failed: " . $con->connect_error); // Error 1, means connection failed
    }

    $username = $con->real_escape_string($_POST["name"]);
    $newscore = (int)$_POST["score"]; // Ensure the score is an integer

    // Check for existing username
    $namecheckquery = "SELECT username, salt, hash, score FROM players WHERE username=?";
    $stmt = $con->prepare($namecheckquery);
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows != 1) {
        echo "5: No user with this nickname exists";
        $stmt->close();
        $con->close();
        exit();
    }

    $stmt->close();

    // Update user's score
    $updatequery = "UPDATE players SET score = ? WHERE username = ?";
    $stmt = $con->prepare($updatequery);
    $stmt->bind_param("is", $newscore, $username);

    if (!$stmt->execute()) {
        die("7: Failed to save data");
    }

    echo "0";

    $stmt->close();
    $con->close();
?>

