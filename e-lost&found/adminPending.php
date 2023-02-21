<?php
    session_start();

    include "connection/db_conn.php";

    if(isset($_SESSION['user_id']) && isset($_SESSION['user_name'])) {
?>
<!DOCTYPE html>
<!-- Designined by CodingLab | www.youtube.com/codinglabyt -->
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <!-- Title -->
    <title>eLF - Pending</title>
    <!-- Style -->
    <link rel="stylesheet" href="css/adminStyle.css">
    <link rel="stylesheet" href="css/allItemadmin.css">
    <!-- Boxicons CDN Link -->
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css" />
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
     
    <script src="js/navbar.js" defer></script>
   </head>
   <body>
    <nav>
      <div class="logo">
        <i class="bx bx-menu menu-icon"></i>
        <span class="logo-name">E-Lost&Found</span>
      </div>
      <div class="sidebar">
        <div class="logo">
          <i class="bx bx-menu menu-icon"></i>
          <span class="logo-name">Hai <?php echo ucfirst($_SESSION['user_name']);?>!</span>
        </div>

        <div class="sidebar-content">
          <ul class="lists">
            <li class="list">
              <a href="dashboardAdmin.php" class="nav-link">
                <i class="bx bx-home-alt icon"></i>
                <span class="link">Home</span>
              </a>
            </li>
            <li class="list">
              <a href="adminAllItemLost.php" class="nav-link">
                <i class="bx bx-folder-open icon"></i>
                <span class="link">All Item</span>
              </a>
            </li>

          <div class="bottom-cotent">
            <li class="list">
              <a href="logout.php" class="nav-link">
                <i class="bx bx-log-out icon"></i>
                <span class="link">Logout</span>
              </a>
            </li>
          </div>
          </ul>
        </div>
      </div>
    </nav>
    <section class="overlay"> 
    <section class="home-section">
    <div class="wrapper">
    <div class="right">
      <?php if (isset($_SESSION['message'])): ?>
        <div class="msg">
          <?php 
            echo $_SESSION['message']; 
            unset($_SESSION['message']);
          ?>
        </div>
      <?php endif ?>
        <div class="info">
            <h3>All Product</h3>
            <!-- Search bar -->
            <div class="search-container">
                  <div class="input-box">
                  <i class="uil uil-search"></i>
                      <form action="" method="post">
                          <input type="text" name="search" value="<?php if(isset($_GET['search'])){echo $_GET['search'];} ?>" placeholder="Search items..." />
                          <button type="submit" class="button">Search</button>
                      </form>
                  </div>
              </div>
            <div class="info_data">
            <table>
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Found Item Name</th>
                      <th>Location Found</th>
                      <th>Time Found</th>
                      <th>Date Found</th>
                      <th>Status</th>
                      <th>Manage</th>
                    </tr>
                  </thead>
                  
                  <tbody>
                    <?php 
                      if(isset($_POST['search'])){
                        $key = $_POST['search'];
                        $query = "SELECT * FROM item_found WHERE item_status = 'Pending' AND item_name LIKE '$key'";
                        $queryrun = mysqli_query($conn, $query);
                
                        if(mysqli_num_rows($queryrun) > 0) {
                            foreach($queryrun as $r) { ?>
                            <tr>
                              <td><?php echo $r["item_id"]; ?></td>
                              <td><?php echo $r["item_name"]; ?></td>
                              <td><?php echo $r["location_name"]; ?></td>
                              <td><?php $date = $r["masa_jumpe"]; echo date('h:i a', strtotime($date));?></td>
                              <td><?php $orgDate = $r["tarikh_jumpe"]; $newDate = date("d/m/Y", strtotime($orgDate)); echo $newDate;?></td>
                              <td><?php echo $r["item_status"]; ?></td>
                              <td><a href="adminOption.php?pid=<?php echo $r['item_id']; ?>" class="btn">Manage</a>
                            </tr>
                    <?php } } else { ?>
                            <tr>
                              <td colspan="7">Doesn't have Anything...</td>
                            </tr>
                    <?php } ?>
                    <?php } else {  
                      $sql = "SELECT * FROM `item_found` WHERE item_status = 'Pending'";
                      $result = $conn->query($sql);
                      $count=$result->num_rows;
                      if($count != 0) { 
                        while($row = $result->fetch_assoc()){
                    ?>
                    <tr>
                      <td><?php echo $row["item_id"]; ?></td>
                      <td><?php echo $row["item_name"]; ?></td>
                      <td><?php echo $row["location_name"]; ?></td>
                      <td><?php $date = $row["masa_jumpe"]; echo date('h:i a', strtotime($date));?></td>
                      <td><?php $orgDate = $row["tarikh_jumpe"]; $newDate = date("d/m/Y", strtotime($orgDate)); echo $newDate;?></td>
                      <td><?php echo $row["item_status"]; ?></td>
                      <td><a href="adminOption.php?pid=<?php echo $row['item_id']; ?>" class="btn">Manage</a>
                    </tr>
                    <?php }} else {?>
                      <tr>
                        <td colspan="7">No Pending Item Available</td>
                      </tr>
                    <?php }}?>
                  </tbody>
                </table>
            </div>
        </div>
      </div>
    </div>
    </section>
    </section>
   

  </body>
</html>
<?php 
  } else{

      header("Location: index.php");

      exit();

  }
?>