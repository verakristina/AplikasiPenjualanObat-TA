<?php
session_start();

// set session
$_SESSION['login'] = false;
?>
<!DOCTYPE html>
<html lang="en" >

<head>
  <meta charset="UTF-8">
  <title> Login Form</title>
  
  
  
      <link rel="stylesheet" href="vera/style.css">

  
</head>

<body>

  <script src="https://use.typekit.net/rjb4unc.js"></script>
<script>try{Typekit.load({ async: true });}catch(e){}</script>

<div class="container">

    <div class="logo">Form Login</div>
    <div class="login-item">
      <form action="cek_login.php" method="post" class="form form-login">
        <div class="form-field">
          <label class="user" for="login-username"><span class="hidden">Username</span></label>
          <input id="login-username" type="text" class="form-input" name= "user" placeholder="Username" required>
        </div>

        <div class="form-field">
          <label class="lock" for="login-password"><span class="hidden">Password</span></label>
          <input id="login-password" type="password" class="form-input" name="pass" placeholder="Password" required>
        </div>

        <div class="form-field">
          <input type="submit" value="Log in">
        </div>
		
      <?php
      // jika mendapatkan parameter $_GET['p']
      if(isset($_GET['p'])){
        ?>
        <div class="pesan"> <?php echo $_GET['p']; ?> </div>
      <?php } ?>
      </form>
    </div>
</div>
<?php
	if(isset($_SESSION['d'])){
		echo "<script>alert('Username atau Password tidak sesuai. Silahkan login kembali');</script>";
		unset($_SESSION['d']);
	}
?>
  
  

</body>

</html>
