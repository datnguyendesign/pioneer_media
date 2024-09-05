<?php

    require_once 'connection.php';

    $pwErr = $emailErr = "";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (empty($_POST['email'])) {
            $emailErr = "Email is required";
        } else {
            $email = test_input($_POST['email']);
        }

        if (empty($_POST['password'])) {
            $pwErr = "Password is required";
        } else {
            $password = test_input($_POST['password']);
        }

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $emailErr = "Invalid Email!";
        } else {
            $sql = "SELECT * FROM account WHERE email='$email' AND password = '$password'";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                $row = mysqli_fetch_assoc($result);
                $message = "Logged in";
                setcookie("user_id", $row["id"], time()+(86400*30), "/");
                header("Location:index.php?message=".$message);
            } else {
                $pwErr = "Password incorrect";
                $emailErr = "Email doesn't exist or incorrect";
            }

        }


    }

    function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

?>