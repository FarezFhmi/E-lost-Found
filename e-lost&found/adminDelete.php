<?php 

session_start(); 

include "connection/db_conn.php";

if(isset($_GET['pid']))
{
    $sql = "DELETE FROM `item_found` WHERE item_id=".$_GET['pid'];
    $conn->query($sql);
	echo 'Deleted successfully.';
    $item_id = $_GET['pid'];
    $query = "SELECT * FROM update_info";
    $queryrun = mysqli_query($conn, $query);
    if(mysqli_num_rows($queryrun) > 0) {
        $sql = "DELETE FROM `update_info` WHERE item_id=".$_GET['pid'];
        $conn->query($sql);
    }  
    $query = "SELECT * FROM `found_info`";
    $queryrun = mysqli_query($conn, $query);
    if(mysqli_num_rows($queryrun) > 0) {
        $sql = "DELETE FROM `found_info` WHERE item_id=".$_GET['pid'];
        $conn->query($sql);
    }
    $query = "SELECT * FROM `claimer_info`";
    $queryrun = mysqli_query($conn, $query);
    if(mysqli_num_rows($queryrun) > 0) {
        $sql = "DELETE FROM `claimer_info` WHERE item_id=".$_GET['pid'];
        $conn->query($sql);
    }
    header("Location: adminAllItemLost.php");

}else {
	header("Location: adminAllItemLost.php");
}
?>