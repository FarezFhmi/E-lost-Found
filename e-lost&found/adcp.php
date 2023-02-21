<?php 

session_start(); 

include "connection/db_conn.php";

if(isset($_POST['update']))
{ 
    $user_id = $_POST['user_id'];
    $new_pass = $_POST['new_pass'];
    $hash = password_hash($password, PASSWORD_BCRYPT); 
    $confem_new_pass = $_POST['confem_new_pass'];

    $update = $conn->query("UPDATE `login_user` SET user_password = '$hash' WHERE user_id = '$user_id'"); 
            
    if($update){ 
        echo "Data Updated Successfully";
        $_SESSION['status'] = "Data Updated Successfully";
        header("Location: adminprofile.php");
    }else{ 
        echo "Failed to updated";
        $_SESSION['status'] = "Failed to updated";
        header("Location: adminprofile.php?Failed to updated");
    } 

}else {
    
    $_SESSION['status'] = "Unknown Error.. Failed To Upload Data !!.";
	header("Location: adminprofile.php?error");
}
?>