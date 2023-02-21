<?php
    session_start();
    include 'connection/db_conn.php';

    if (isset($_SESSION['user_id']) && isset($_SESSION['user_name'])) {

    $user_id = $_SESSION['user_id'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>eLF - Add Found Item</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/additem.css">
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
        <div class="container">
            <form action="add.php" method="post" enctype="multipart/form-data">
                <h2> Jumpe barang ? Masukkan Disini !!! </h2>
                <div class="top">
                    <input type="hidden" name="user_id" value="<?php echo $user_id; ?>">
                    <input type="text" name="name_item" placeholder="Nama barang yang dijumpai" required>
                    <input type="text" name="lokasi_item" placeholder="Lokasi barang dijumpai" required>
                </div>
                <div class="date">
                    <input type="time" name="masa_found" placeholder="Masa barang di jumpai" required>
                    <input type="date" name="tarikh_found" placeholder="Tarikh barang di jumpai" required>
                </div>
                <div class="bottom">
                    <select name="status" id="status" required>
                        <option value="none" selected disabled hidden>Choose Category</option>
                        <option value="Book">Book</option>
                        <option value="Watch">Watch</option>
                        <option value="Technology">Technology</option>
                        <option value="Other">Other</option>
                    </select>
                    <input type="file" name="gambar_item" required>
                    <textarea name="desc_found" rows="4" placeholder="Description barang yang dijumpai"></textarea>
                </div>
                <button type="submit"name="save_data" class="btn btn-primary">Submit</button>
            </form>
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