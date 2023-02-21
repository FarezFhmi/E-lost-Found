<?php
    session_start(); 

    include "connection/db_conn.php";
    
    if (isset($_POST['export_excel'])) {
        
        $sql = "SELECT * FROM `item_found` RIGHT JOIN `claimer_info` on item_found.item_id = claimer_info.item_id";
        $result = mysqli_query($conn, $sql);
        if(mysqli_num_rows($result) > 0) {
            
            $output = '
                        <table class="table" bordered="1">
                            <tr>
                                <th>Item ID</th>
                                <th>Item Name</th>
                                <th>Location Jumpa</th>
                                <th>Masa Jumpa</th>
                                <th>Tarikh Jumpa</th>
                                <th>Description Item</th>
                                <th>Item Status</th>
                                <th>Claimer Name</th>
                                <th>Claimer No.Matrix</th>
                                <th>Claimer No.Phone</th>
                            </tr>
                        ';
            while($row = mysqli_fetch_array($result)){
                if($row['item_status'] === 'Collected'){
                    $time = $row["masa_jumpe"];
                    $newTime = date('h:i A', strtotime($time));

                    $orgDate = $row["tarikh_jumpe"];
                    $newDate = date("d-m-Y", strtotime($orgDate));

                    $output .= '
                        <tr>
                            <th>'.$row['item_id'].'</th>
                            <th>'.$row['item_name'].'</th>
                            <th>'.$row['location_name'].'</th>
                            <th>'.$newTime.'</th>
                            <th>'.$newDate.'</th>
                            <th>'.$row['desc_item'].'</th>
                            <th>'.$row['item_status'].'</th>
                            <th>'.$row['claimer_name'].'</th>
                            <th>'.$row['claimer_matrix'].'</th>
                            <th>'.$row['claimer_phone'].'</th>
                        </tr>
                    ';   
                }else{
                    $output .= '
                        <tr>
                            <th colspan="10">'."No Data Available".'</th>
                        </tr>
                    ';
                }  
            }
            $output .= '</table>';
            header('Content-Type: application/xls');
            header('Content-Disposition: attachment; filename=E-Lost&Found.xls');
            echo $output;
        }

    }
?>