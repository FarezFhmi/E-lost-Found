<?php 

session_start(); 

include "connection/db_conn.php";

$status = $statusMsg = ''; 

if(isset($_POST['save_data']))
{
    $user_id = $_POST['user_id'];
    $name = $_POST['name_item'];
    $lokasi = $_POST['lokasi_item'];
    /*msjp = masa jumpe */
    $msjp = $_POST['masa_found'];
    /*tj = tarikh jumpe*/
    $tj = date('Y-m-d', strtotime($_POST['tarikh_found']));
    /*image upload*/
    $item_info = $_POST['desc_found'];
    $selected = $_POST['status'];
    $status_item = "Pending";
    date_default_timezone_set('Asia/Kuala_Lumpur');
    $date = date('y-m-d');
    $time = date("H:i:s");

    if(!empty($_FILES["gambar_item"]["name"])) { 
        // Get file info 
        $fileName = basename($_FILES["gambar_item"]["name"]); 
        $fileType = pathinfo($fileName, PATHINFO_EXTENSION); 
         
        // Allow certain file formats 
        $allowTypes = array("jpg","png","jpeg","heif"); 
        if(in_array($fileType, $allowTypes)){ 
            $image = $_FILES['gambar_item']['tmp_name']; 
            $imgContent = addslashes(file_get_contents($image)); 
         
            // Insert image content into database 
            $insert1 = $conn->query("INSERT INTO `item_found` (`user_id`,`item_name`, `location_name`, `masa_jumpe`, `tarikh_jumpe`, `gambar_item`, `desc_item`, `item_category`, `item_status`)
					VALUES ('$user_id','$name','$lokasi','$msjp','$tj','$imgContent','$item_info','$selected','$status_item')");  
            if($insert1){ 
                $sql = "SELECT * FROM item_found WHERE item_name= '$name'";
                $result = $conn->query($sql);
                while($row = $result->fetch_assoc()) {
                    $item_id = $row["item_id"];
                    $insert2 = $conn->query("INSERT INTO `update_info` (`item_id`, `tarikh_update`, `masa_update`) VALUES ('$item_id','$date','$time')");
                    if($insert2){
                        header("Location: itemUpload.php");
                    }
                }
            }else{ 
                header("Location: addFoundItem.php?Error..");
            }  
        }else{ 
            $statusMsg = 'Sorry, only JPG, JPEG, PNG, and HEIF files are allowed to upload.'; 
            header("Location: addFoundItem.php?Sorry, only JPG, JPEG, PNG, and HEIF files are allowed to upload.");
        } 
    }else{ 
        $statusMsg = 'Please select an image file to upload.'; 
        header("Location: addFoundItem.php?Please select an image file to upload.");
    } 
}else {
	header("Location: addFoundItem.phpError..");
}
?>