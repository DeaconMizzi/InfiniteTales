
<?php
    include 'includes/header.php';
?>
<div class="form-container">
<form method="post" action="signin.php" style="border:1px solid #ccc;" class="formSign">
  <?php include('errors.php'); ?>
  <div class="container">
    <h1>Sign In</h1>
    <p>Please log in your account details.</p>
    <hr>

    <label for="email"><b>Username</b></label>
    <input type="text" placeholder="Enter Username" name="username" required>

    <label for="psw"><b>Password</b></label>
    <input type="password" placeholder="Enter Password" name="password" required>
    
    <label>
      <input type="checkbox" checked="checked" name="remember" style="margin-bottom:15px"> Remember me
    </label>


    <div class="clearfix">
      <button type="submit" class="signupbtn" name="login_user">Sign In</button>
    </div>
  </div>
</form>
</div>

<?php
    include 'includes/footer.php';
?>