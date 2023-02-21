<?php 

session_start(); 

include "connection/db_conn.php";

if (isset($_POST['uname']) && isset($_POST['upass'])) {

    function validate($data){

       $data = trim($data);

       $data = stripslashes($data);

       $data = htmlspecialchars($data);

       return $data;

    }

    $uname = validate($_POST['uname']);

    $pass = validate($_POST['upass']);

    if (empty($uname)) {

        header("Location: index.php?error=User Name is required");

        exit();

    }else if(empty($pass)){

        header("Location: index.php?error=Password is required");

        exit();

    }else{
        $sql = "SELECT * FROM login_user where user_name = '$uname'";
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) === 1) {

            $row = mysqli_fetch_assoc($result);
            
            if (password_verify($pass, $row['user_password'])) {

                if($row['user_type'] == 'admin'){
                    
                    echo "Logged in!";
                    $_SESSION['user_name'] = $row['user_name'];
                    $_SESSION['user_id'] = $row['user_id'];
                    header('location: dashboardAdmin.php');
           
                }else if($row['user_type'] == 'user'){
           
                    echo "Logged in!";
                    $_SESSION['user_name'] = $row['user_name'];
                    $_SESSION['user_id'] = $row['user_id'];
                    header("location: Home.php");
           
                 }else {

                    $error[] = 'incorrect username or password!';
                    header("Location: index.php?error=Incorect User name or password");
                 }

            }else{

                header("Location: index.php?error=Incorect User name or password");

                exit();
            }

        }else{

            header("Location: index.php?error=Incorect User name or password");

            exit();

        }
    }

}else{

    header("Location: index.php?");

    exit();

}