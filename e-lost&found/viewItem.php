<?php
    session_start();
    include 'connection/db_conn.php';
    $p_id = $_GET['pid'];

    $sql = "SELECT * FROM item_found WHERE item_id= '{$p_id}' ";
    $result = $conn->query($sql);

    if (isset($_SESSION['user_id']) && isset($_SESSION['user_name'])) {
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>eLF - View Item</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/viewitem.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://kit.fontawesome.com/e8af91a40e.js" crossorigin="anonymous"></script>
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
    <div class="view">
    <div class="item-section">
        <?php while($row = $result->fetch_assoc()) { ?>
            <div class="item-container">
                    <div class="item-image">
                        <img width="500" height="500" src="data:image/jpg;charset=utf8;base64,
                        <?php echo base64_encode($row["gambar_item"]); ?>" alt="item image">
                    </div>
                    <div class="desc">
                        <h2 class="item-heading">
                            <?php echo $row["item_name"]; ?>
                        </h2>
                        <div class="detailscontainer">
                            <p class="item-text"> Location : <?php echo $row["location_name"]; ?></p>
                            <p class="item-text"> Time Found : <?php 
                                $time = $row["masa_jumpe"];
                                $newTime =date('h:i A', strtotime($time));
                                echo $newTime; ?> 
                                </p>
                            <p class="item-text"> Date Found : <?php 
                                $orgDate = $row["tarikh_jumpe"];
                                $newDate = date("d-m-Y", strtotime($orgDate));  
                                echo $newDate; ?> 
                                </p>
                        <p class="item-text"> Description :</p>
                        <div class="desccontainer">
                        <p class="item-description">
                            <?php echo $row["desc_item"]; ?>
                        </p>
                        </div>
                        </div>
                    </div>
                </div>
        <?php } ?>
        </div>
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

      header("Location: index.php");

      exit();

  }
?>