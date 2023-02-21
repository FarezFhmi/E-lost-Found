<?php
    session_start();
    include "connection/db_conn.php";

    if (isset($_POST['save_data'])) {
        $username = $_POST['uname'];
        $password = $_POST['upass'];
        $hash = password_hash($password, PASSWORD_BCRYPT); 
        $user_type = "user";
            $insert = $conn->query("INSERT INTO `login_user` (`user_name`, `user_password`, `user_type`) VALUES ('$username','$hash','$user_type')");
            if ($insert) {
                echo '<p class="success">Your registration was successful!</p>';
                header("Location: loginPage.php?Successfull Register");
            } else {
                echo '<p class="error">Something went wrong!</p>';
            }
    }
?>