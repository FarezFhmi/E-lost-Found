<?php 

session_start(); 

include "connection/db_conn.php";

if(isset($_POST['update']))
{ 
    $item_id = $_POST['item_id'];
    $namefound = $_POST['namefound'];
    $matrixfound = $_POST['matrixfound'];
    $phonefound = $_POST['phonefound'];
    $status_item = $_POST['status_item'];

    $update = $conn->prepare("UPDATE item_found SET item_status = '$status_item' WHERE item_id = '$item_id'"); 
    if($update->execute()){ 
        $sql = "SELECT * FROM item_found WHERE item_id= '$item_id'";
        $result = $conn->query($sql);
        while($row = $result->fetch_assoc()) {
            $item_id = $row["item_id"];
            $insert2 = $conn->query("INSERT INTO `found_info` (`item_id`, `found_name`, `found_matrix`, `found_phone`) VALUES ('$item_id','$namefound','$matrixfound','$phonefound')");
            if($insert2){
                $_SESSION['status'] = "Data Updated Successfully";
            header("Location: adminAllItemLost.php");
            }
        }
    }else{ 
        header("Location: pendingItem.php?failed to update");
    }
}else {
    
	header("Location: pendingItem.php?Unknown Error.. Failed To Update Data !!.");
}
?>