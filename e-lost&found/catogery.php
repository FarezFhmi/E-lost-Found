<?php
    session_start();
    include 'connection/db_conn.php';

    if (isset($_SESSION['user_id']) && isset($_SESSION['user_name'])) {
?>
<!DOCTYPE html>
<html lang="en">
    
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>eLF - Catogery</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/catogery.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css" />
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

    <!--Item Section-->
    <div class="text">
        <h1>All Item Found</h1>
    </div>
    
    <div class="item-section">
            <a class="itemview" href="catogeryBook.php">
                <div class="item-container">
                    <div class="main-item">
                        <img width="200" height="200" src="photo/gambar_buku.png" alt="">
                    </div>
                    <h2 class="item-heading">Book</h2>
                </div>
            </a>
            <a class="itemview" href="catogeryWatch.php">
                <div class="item-container">
                    <div class="main-item">
                        <img width="200" height="200" src="photo/gambar_jam.png" alt="">
                    </div>
                    <h2 class="item-heading">Watch</h2>
                </div>
            </a>
            <a class="itemview" href="catogeryTechnology.php">
                <div class="item-container">
                    <div class="main-item">
                        <img width="200" height="200" src="photo/gambar_techno.png" alt="">
                    </div>
                    <h2 class="item-heading">Technology</h2>
                </div>
            </a>
            <a class="itemview" href="catogeryOther.php">
                <div class="item-container">
                    <div class="main-item">
                        <img width="200" height="200" src="photo/gambar_other.png" alt="">
                    </div>
                    <h2 class="item-heading">Other</h2>
                </div>
            </a>
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