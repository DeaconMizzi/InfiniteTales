<?php
    include 'includes/header.php';
?>
<div class="form-container">
<form action="/action_page.php" style="border:1px solid #ccc;" class="formSign">
  <div class="container">
    <h1>Sign In</h1>
    <p>Please log in your account details.</p>
    <hr>

    <label for="email"><b>Email</b></label>
    <input type="text" placeholder="Enter Email" name="email" required>

    <label for="psw"><b>Password</b></label>
    <input type="password" placeholder="Enter Password" name="psw" required>
    
    <label>
      <input type="checkbox" checked="checked" name="remember" style="margin-bottom:15px"> Remember me
    </label>


    <div class="clearfix">
      <button type="submit" class="signupbtn">Sign In</button>
    </div>
  </div>
</form>
</div>

<?php
    include 'includes/footer.php';
?>