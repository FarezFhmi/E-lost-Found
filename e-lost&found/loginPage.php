<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	
	<title>eLF - Sign In</title>

    <!-- Main css -->
	<link rel="stylesheet" href="css/login.css">
</head>
<body>
  <div class="container">
    <input type="checkbox" id="check">
    <div class="login form">
      <header><img src="photo/bg4.png" class="logo">Login</header>
      <form action="login.php" method="POST">
        <input type="text" name="uname" placeholder="Enter your username" required>
        <input type="password" name="upass" placeholder="Enter your password" required>
        <input type="submit" class="button" value="Login">
      </form>
      <div class="signup">
        <span class="signup">Don't have an account?
         <label for="check">Signup</label>
        </span>
      </div>
    </div>
    <div class="registration form">
      <header><img src="photo/bg4.png" class="logo">Signup</header>
      <form action="register.php" method="POST">
        <input type="text" name="uname" placeholder="Enter your username" required>
        <input type="password" name="upass" placeholder="Enter your password" required>
        <input type="submit" class="button" name="save_data" value="Signup">
      </form>
      <div class="signup">
        <span class="signup">Already have an account?
         <label for="check">Login</label>
        </span>
      </div>
    </div>
  </div>   
</body>
</html>
