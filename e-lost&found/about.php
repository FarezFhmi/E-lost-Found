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
    <title>eLF - About US</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/about.css">
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

    <!--about Section-->
    <div id="aboutintro">
        <div class="container">
            <div class="header-text">
                <h1>"Connecting The Missing Pieces"</h1>
                <p>Our website is dedicated to reuniting lost items with their rightful owners. From sentimental possessions to everyday essentials, we strive to bring a sense of closure and peace to those who have lost something dear to them.</p>
            </div>
        </div>
    </div>

    <div id="obj">
        <div class="container">
            <div class="grid"> 
                <div>
                    <i class="fa-solid fa-eye"></i>
                    <h2>FOCUS</h2>
                    <p>Staying focused on providing the best service possible and being attentive to the needs of the users, and also remaining on top of the latest technology and trends to improve the website.</p>
                </div>
                <div>
                    <i class="fa-solid fa-heart"></i>
                    <h2>PASSION</h2>
                    <p>a strong drive to reunite lost items with their rightful owners, dedication to providing an easy-to-use platform, and a commitment to continuously improving the website.</p>
                </div>
                <div>
                    <i class="fa-sharp fa-solid fa-people-arrows"></i>
                    <h2>EMPATHY</h2>
                    <p>Providing a compassionate and understanding service, and handling personal information with sensitivity.</p>
                </div>
                <div>
                    <i class="fa-solid fa-people-group"></i>
                    <h2>TEAMWORK</h2>
                    <p>Working collaboratively and efficiently to achieve a common goal of reuniting lost items with their rightful owners. It involves effective communication, trust, and a shared sense of responsibility.</p>
                </div>
            </div> 
        </div>
    </div>

    <div id="aboutteam">
        <h1 class="strapline">Meet the team</h1>
            <div class="row">
                <div class="col-1">
                    <img src="photo/reez.png" alt=""/> 
                </div>
                <div class="col-2">
                    <h1 class="sub-title">FAREEZ FAHMI</h1>
                    <h2>LEAD DEVELOPER</h2>
                    <p class="work-list">Fareez was a student in a computer science program at a university. Even though he was still studying, Fareez had already shown his skills as a lead developer. He was the head of a group of students who were working on a software project for a subject Workshop. He was responsible for organizing the team, assigning tasks, and making sure that everything was on track. Fareez's technical skills were impressive, but it was his leadership abilities that really stood out.
                    </p>
                </div>
            </div>
            <div class="row">
                <div class="col-1">
                    <img src="photo/paan.png" alt=""/> 
                </div>
                <div class="col-2">
                    <h1 class="sub-title">FARHAN AWAL-LUDDIN</h1>
                    <h2>DEVELOPER</h2>
                    <p class="work-list">Farhan was a student studying computer science at a university. He had a passion for software development and had taken a variety of programming classes. He had worked on various projects as a developer. Mark had a strong foundation in various programming languages such as C++, Python and Java, and had experience working on different types of projects like web development, desktop application, and mobile app development.
                    </p>
                </div>
            </div>
            <div class="row">
                <div class="col-1">
                    <img src="photo/mal.png" alt=""/> 
                </div>
                <div class="col-2">
                    <h1 class="sub-title">IKMAL NA'IM</h1>
                    <h2>FRONT-END DEVELOPER</h2>
                    <p class="work-list">Ikmal was a student studying computer science at a university. He had a passion for web development and had taken several classes on front-end development. She was also a member of the university's web development club, where she worked on various projects and honed her skills. Ikmal was known for her strong attention to detail and her ability to create visually appealing designs. He was proficient in HTML, CSS, and JavaScript and had experience working with popular front-end frameworks such as React.js and Angular.js.
                    </p>
                </div>
            </div>
            <div class="row">
                <div class="col-1">
                    <img src="photo/ikram.png" alt=""/> 
                </div>
                <div class="col-2">
                    <h1 class="sub-title">IKRAM BAZURIM</h1>
                    <h2>CONTENT DESIGNER</h2>
                    <p class="work-list">Ikram was a student studying computer science at a university. Even though, he had always been interested in creating visually appealing and effective designs, and had taken various classes in design theory and practice. He was also worked on multiple projects as a designer. Ikram was known for her strong attention to detail and her ability to create designs that were both aesthetically pleasing and effective at communicating a message. She was proficient in using design software such as Adobe Illustrator and Photoshop and had experience creating designs for various mediums such as web, print, and social media.

                    </p>
                </div>
            </div>
    </div>

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