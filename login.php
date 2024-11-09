<?php
    $con = new mysqli('localhost', 'root', 'root', 'unitysql');

    // Checar conexão com o banco de dados
    if ($con->connect_error) {
        die("1: Connection failed: " . $con->connect_error); // Error 1, means connection failed
    }

    $username = $con->real_escape_string($_POST["name"]);
    $password = $_POST["password"];

    // Check for existing usernames
    $namecheckquery = "SELECT username, salt, hash, score FROM players WHERE username=?";
    $stmt = $con->prepare($namecheckquery);
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows == 0) {
        echo "5: No user with this nickname exists";
        $stmt->close();
        $con->close();
        exit();
    }

    // Verify data
    $existinginfo = $result->fetch_assoc();
    $salt = trim($existinginfo["salt"]);
    $hash = trim($existinginfo["hash"]);

    $loginhash = crypt($password, $salt);
    if ($hash !== $loginhash) {
        echo "6: Incorrect password";
        $stmt->close();
        $con->close();
        exit();
    }

    echo "0\t" . $existinginfo["score"];

    $stmt->close();
    $con->close();
?>

