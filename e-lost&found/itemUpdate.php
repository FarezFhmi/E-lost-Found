<?php 

session_start(); 

include "connection/db_conn.php";

if(isset($_POST['update']))
{ 
    $item_id = $_POST['item_id'];
    $nameclaimer = $_POST['nameclaimer'];
    $matrixclaimer = $_POST['matrixclaimer'];
    $phoneclaimer = $_POST['phoneclaimer'];
    $statusclaimer = $_POST['statusclaimer'];

    $update = $conn->prepare("UPDATE item_found SET item_status = '$statusclaimer' WHERE item_id = '$item_id'"); 
    if($update->execute()){ 
        $sql = "SELECT * FROM item_found WHERE item_id= '$item_id'";
        $result = $conn->query($sql);
        while($row = $result->fetch_assoc()) {
            $item_id = $row["item_id"];
            $insert2 = $conn->query("INSERT INTO `claimer_info` (`item_id`, `claimer_name`, `claimer_matrix`, `claimer_phone`) VALUES ('$item_id','$nameclaimer','$matrixclaimer', '$phoneclaimer')");
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