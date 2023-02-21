<?php
    session_start();
    include 'connection/db_conn.php';

    $sql = "SELECT * FROM item_found where item_status = 'READY TO COLLECT'";

    if (isset($_SESSION['user_id']) && isset($_SESSION['user_name'])) {
?>
<!DOCTYPE html>
<html lang="en">
    
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>eLF - Home</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/home.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css" />
    <script src="https://kit.fontawesome.com/e8af91a40e.js" crossorigin="anonymous"></script>
    <script src="js/script.js" defer></script>
</head>


<body> 
    <!--Navbar Section-->
    <nav class="nav">
      <i class="uil uil-bars navOpenBtn"></i>
      <a href="Home.php" class="logo">E-Lost&Found</a>

      <ul class="nav-links">
        <i class="uil uil-times navCloseBtn"></i>
        <li><a href="catogery.php">Lost</a></li>
        <li><a href="addFoundItem.php">Found</a></li>
        <li><a href="itemUpload.php">Item</a></li>
        <li><a href="about.php">About Us</a></li>
      </ul>
      <a href="logout.php"><i class="fa fa-user signout grow"></i> Hi <?php echo ucfirst($_SESSION['user_name']);?>, Sign Out</a>
    </nav>
      
    <section class="home-section">

    <div class="banner-container">
        <div class="banner">
            <img src="photo/Lost-and-found.png" alt="">
        </div>
    </div>
    <!--Item Section-->
    <div class="text">
        <h1>All Item Found</h1>
    </div>
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
    <div class="item-section">
    <?php
    if(isset($_POST['search'])){
        $key = $_POST['search'];
        $query = "SELECT * FROM item_found WHERE item_status = 'READY TO COLLECT' AND item_name LIKE '$key' ORDER BY item_name ASC";
        $queryrun = mysqli_query($conn, $query);

        if(mysqli_num_rows($queryrun) > 0) {
            foreach($queryrun as $r) { ?>
            <a class="itemview" href="viewItem.php?pid=<?php echo $r['item_id'];?> ">
                <div class="item-container">
                    <div class="main-item">
                        <img width="200" height="200" src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($r["gambar_item"]); ?>" alt="">
                    </div>
                    <h2 class="item-heading">
                        <?php echo $r["item_name"]; ?>
                    </h2>
                    <p class="item-description">
                        <?php echo $r["item_status"]; ?>
                    </p>
                </div>
            </a>
       <?php } } else { ?>
        <h2>Doesn't have Anything...</h2>
    <?php } ?>
        <?php } else { 
        $result = $conn->query($sql);
        $count=$result->num_rows;
        if($count != 0){
            while($row = $result->fetch_assoc()) { 
        ?>
            <a class="itemview" href="viewItem.php?pid=<?php echo $row['item_id'];?> ">
                <div class="item-container">
                    <div class="main-item">
                        <img width="200" height="200" src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($row["gambar_item"]); ?>" alt="">
                    </div>
                    <h2 class="item-heading">
                        <?php echo $row["item_name"]; ?>
                    </h2>
                    <p class="item-description">
                        <?php echo $row["desc_item"]; ?>
                    </p>
                </div>
            </a>
        <?php }} else {  ?>
            <h2>Doesn't Have Anything Lost..</h2>
        <?php }}?>
        </div>
    </section>
<!--Footer Section-->
<div class="footer-section">
        <div class="footer-item">
            <h2>Company</h2>
            <p><a href="AboutUs.php">       About Us</a>             </p>
            <p><a href="ContactUs.php">     Contact Us</a>           </p>
            <p><a href="Home">              Our Services</a>         </p>
        </div>
        <div class="footer-item">
            <h2>Developers </h2>
            <p> MUHAMMAD FAREEZ FAHMI BIN FAUZI    </p>
            <p> MUHAMMAD FARHAN BIN MD AWAL-LUDIN  </p>
            <p> MUHAMMAD IKMAL FITRI BIN NAIM      </p>
            <p> MUHAMMAD IKRAM BIN BAZURIM         </p>
            
        </div>
        <div class="footer-item">
            <h2>ROLE</h2>
            <p> LEAD DEVELOPER</p>
            <p> DEVELOPER </p>
            <p> FRONT-END DEVELOPER</p>
            <p> CONTENT DESIGNER</p>
        </div>
        <div class="footer-item social">
            <h2> Follow Us </h2>
            <ul>
                <li> <i class="fa-brands fa-instagram"></i> </li>
                <li> <i class="fa-brands fa-youtube"></i> </li>
                <li> <i class="fa-brands fa-twitter"></i> </li>
            </ul>
        </div>
        </div>
</body>
</html>

<?php 
  }else{

      header("Location: index.php?no item");

      exit();

  }
?>