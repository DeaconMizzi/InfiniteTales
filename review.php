<?php
    include 'includes/header.php';
?>
<br>
<h1 style="text-align:center; color:white;">Review the Book!</h1>
<div class="containerrev">
  <div class="container__items">
    <input type="radio" name="stars" id="st5">
    <label for="st5">
      <div class="star-stroke">
        <div class="star-fill"></div>
      </div>
      <div class="label-description" data-content="Excellent"></div>
    </label>
    <input type="radio" name="stars" id="st4">
    <label for="st4">
      <div class="star-stroke">
        <div class="star-fill"></div>
      </div>
      <div class="label-description" data-content="Good"></div>
    </label>
    <input type="radio" name="stars" id="st3">
    <label for="st3">
      <div class="star-stroke">
        <div class="star-fill"></div>
      </div>
      <div class="label-description" data-content="OK"></div>
    </label>
    <input type="radio" name="stars" id="st2">
    <label for="st2">
      <div class="star-stroke">
        <div class="star-fill"></div>
      </div>
      <div class="label-description" data-content="Bad"></div>
    </label>
    <input type="radio" name="stars" id="st1">
    <label for="st1">
      <div class="star-stroke">
        <div class="star-fill"></div>
      </div>
      
      <div class="label-description" data-content="Terrible"></div>
    </label>
  </div>
</div>

<?php
    include 'includes/footer.php';
?>