
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">    
    <title>Daily Shop | Account Page</title>
    
    <!-- Font awesome -->
    <link href="css/font-awesome.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/login.css">
    

   

  </head>
  <body>
  
     <div class="container">
      <header>Login Form</header>
      <form action="index.php" method="POST">
        <div class="input-field">
          <input type="text" required>
          <label>Email or Username</label>
        </div>
        <div class="input-field">
          <input class="pswrd" type="password" required>
          <span class="show">SHOW</span>
          <label>Password</label>
        </div>
        <div class="button">
          <div class="inner">
          </div>
          <button>LOGIN</button>
        </div>
      </form>
      <div class="auth">
      Or login with</div>
      <div class="links">
        <div class="facebook">
          <i class="fab fa-facebook-square"><span>Facebook</span></i>
        </div>
        <div class="google">
          <i class="fab fa-google-plus-square"><span>Google</span></i>
        </div>
      </div>
      <div class="signup">
        Not a member? <a href="#">Signup now</a>
      </div>
    </div>
    <script src="js/login.js"></script>

  </body>
</html>