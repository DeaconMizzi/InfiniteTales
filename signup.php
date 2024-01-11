
<?php
    include 'includes/header.php';
?>

<div class="form-container">
  <form method = "post" action="signup.php" style="border:1px solid #ccc;" class="formSign">
    <?php include('errors.php'); ?>
    <div class="container">
      <h1>Sign Up</h1>
      <p>Please fill in this form to create an account.</p>
      <hr>

      <label for="email"><b>Username</b></label>
      <input type="text" placeholder="Enter Username" name="username" value="<?php echo $username; ?>" required>

      <label for="email"><b>Email</b></label>
      <input type="text" placeholder="Enter Email" name="email" value="<?php echo $email; ?>" required>

      <label for="psw"><b>Password</b></label>
      <input type="password" placeholder="Enter Password" name="password_1" required>

      <label for="psw-repeat"><b>Repeat Password</b></label>
      <input type="password" placeholder="Repeat Password" name="password_2" required>
      

      <div class="clearfix">
        <button type="submit" class="signupbtn" name="reg_user">Sign Up</button>
      </div>
        Already a member? <a href="signin.php">Sign in</a>
    </div>
  </form>
</div>
<?php
    include 'includes/footer.php';
?>