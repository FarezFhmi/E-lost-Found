<?php
    session_start();

    include "connection/db_conn.php";

    $sql = "SELECT * FROM `item_found` LEFT JOIN `update_info` on item_found.item_id = update_info.item_id";

    if (isset($_SESSION['user_id']) && isset($_SESSION['user_name'])) {
?>
<!DOCTYPE html>
<!-- Designined by CodingLab | www.youtube.com/codinglabyt -->
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <!-- Title -->
    <title>eLF - Dashboard Admin</title>
    <!-- Style -->
    <link rel="stylesheet" href="css/adminhome.css">
    <link rel="stylesheet" href="css/adminStyle.css">
    <!-- Boxicons CDN Link -->
    <link 
    href="https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css" 
    rel="stylesheet"/>

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
    <div class="home-content">
      <div class="overview-boxes">
        <a class="box" href="adminAllItemLost.php">
          <div class="right-side">
          <?php 
          $result = $conn->query("select * from item_found");
          $count=$result->num_rows;
          ?>
            <div class="box-topic">Item Lost</div>
            <div class="number"><?php echo "$count";?></div>
          </div>
          <i class='bx bxs-user item'></i>
        </a>
        
        <a class="box" href="adminPending.php">
        <?php 
          $result = $conn->query("select * from item_found where item_status='PENDING'");
          $count=$result->num_rows;
          ?>
          <div class="right-side">
            <div class="box-topic">Item Pending</div>
            <div class="number"><?php echo "$count";?></div>
          </div>
          <i class='bx bxs-user-x item two' ></i>
        </a>
        <a class="box" href="adminNotClaimed.php">
        <?php 
          $result = $conn->query("select * from item_found where item_status='READY TO COLLECT'");
          $count=$result->num_rows;
          ?>
          <div class="right-side">
            <div class="box-topic">Not Claimed</div>
            <div class="number"><?php echo "$count";?></div>
          </div>
          <i class='bx bxs-user-plus item three' ></i>
        </a>
        <a class="box" href="adminCompleted.php">
        <?php 
          $result = $conn->query("select * from item_found where item_status='COLLECTED'");
          $count=$result->num_rows;
          ?>
          <div class="right-side">
            <div class="box-topic">Claimed</div>
            <div class="number"><?php echo "$count";?></div>
          </div>
          <i class='bx bxs-user-check item four' ></i>
        </a>
      </div>
      

      <div class="sales-boxes">
        <div class="recent-sales box">
          <div class="title">Recent Item Found</div>
          <div class="sales-details">
            <ul class="details">
            <?php
              $show = $conn->query($sql);
              $count=$show->num_rows;
              if($count != 0) { ?>
              <li class="topic">Date</li>
              <?php
              while($row = $show->fetch_assoc()) { 

                $orgDate = $row["tarikh_update"];
                $newDate = date("d/m/Y", strtotime($orgDate));  
                ?>
              <li><?php echo $newDate;?></li>
              <?php } ?>
            </ul>
            <ul class="details">
              <li class="topic">Time</li>
              <?php 
              $show = $conn->query($sql);
              while($row = $show->fetch_assoc()) { ?>
              <?php 
                $time = $row["masa_update"];
                $newTime = date('h:i A', strtotime($time));?>
              <li><?php echo $newTime;?></li>
              <?php } ?>
            </ul>
            <ul class="details">
            <li class="topic">Name Item Found</li>
            <?php 
              $show = $conn->query($sql);
              while($row = $show->fetch_assoc()) { ?>
            <li><?php echo $row["item_name"];?></li>
            <?php } ?>
          </ul>
          <ul class="details">
            <li class="topic">Status Item</li>
            <?php 
              $show = $conn->query($sql);
              while($row = $show->fetch_assoc()) { ?>
            <li><?php echo $row["item_status"];?></li>
            <?php } ?>
          </ul>
          <ul class="details">
          <?php } else { ?>
              <div class="no-item">
                <p>No Data Available</p>
              </div>
          </ul>
          <?php }?>
          </div>
          <div class="button">
            <a href="adminAllItemLost.php">See All</a>
          </div>
        </div>
        <div class="top-sales box">
          <div class="title">Claimer Information</div>
          <ul class="top-sales-details">
            <?php 
              $sql = "SELECT * FROM `claimer_info`";
              $show = $conn->query($sql);
              $count=$show->num_rows;
              if($count != 0) { 
                while($row = $show->fetch_assoc()) { ?>
            <li>
            <a href="#">
              <!--<img src="images/sunglasses.jpg" alt="">-->
              <span class="product"><?php echo $row["claimer_name"];?></span>
            </a>
            <span class="price"><?php echo $row["claimer_matrix"];?></span>
          </li>
          <?php }} else { ?>
            <div class="no-item">
                <p>No Data Available</p>
            </div>
          <?php }?>
          </ul>
        </div>
      </div>
    </div>
    </section>
    </section>
    
  </body>
</html>
<?php 
  }else{

      header("Location: index.php");

      exit();
  }
?>
<!--<a href="url_to_delete" onclick="return confirm('Are you sure you want to delete this item?');">Delete</a>-->
