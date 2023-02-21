<?php
    include "connection/db_conn.php";
    session_start();
    $p_id = $_GET['pid'];
    
    $user_id = $_SESSION['user_id'];
    $user_name = $_SESSION['user_name'];
    if (isset($user_id) && isset($user_name)) {
?>
<!DOCTYPE html>
<!-- Coding by CodingLab | www.codinglabweb.com-->
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <!--<title>Sidebar Menu | Side Navigation Bar</title>-->
    <title>eLF - Claimed Item</title>
    <!-- CSS -->
    <<link rel="stylesheet" href="css/adminStyle.css" />
    <link rel="stylesheet" href="css/adminupdateproduct.css" />
    <!-- Boxicons CSS -->
    <link
      href="https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css"
      rel="stylesheet"
    />

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
  <?php 
    $sql = "SELECT * FROM item_found where item_id = '$p_id'";
    $result = $conn->query($sql);
    while($row = $result->fetch_assoc()) { 
  ?>
  <div class="wrapper">
    <div class="left">
        <img width="200" height="200" src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($row["gambar_item"]); ?>" alt="">
         <h1><?php echo strtoupper($row["item_name"]); ?></h1>
    </div>
    <div class="right">
        <div class="info">
          <form action="itemUpdate.php" method="post" enctype="multipart/form-data">
          <input type="hidden" name="item_id" value="<?php echo $row['item_id'];?>" />
            <h3>Claim Information</h3>
            <div class="info_data">
                <div class="input-box"> 
                    <h4>Name Claimer : </h4>
                    <input type="text" name="nameclaimer" required />
                    <h4>No Matrik : </h4>
                    <input type="text" name="matrixclaimer" required />
                    <h4>No Phone : </h4>
                    <input type="text" name="phoneclaimer" required />
                    <h4>Status : </h4>
                    <input type="text" name="statusclaimer" value="Collected" readonly />
                </div>
            </div>
        </div>
        <button type="submit" name ="update">Submit</button>
        </form>
      </div>
    </div>
    <?php } ?>
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
