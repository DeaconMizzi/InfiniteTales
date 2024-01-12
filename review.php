<?php
include 'includes/header.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  // Check if the 'stars' field is set in the POST data
  if (isset($_POST['stars'])) {
      // Get the selected star rating
      $selectedRating = $_POST['stars'];

      // Get the 'bookId' and 'buttonId' from the URL
      $selectedBookId = isset($_GET['bookId']) ? $_GET['bookId'] : null;
      $buttonId = isset($_GET['buttonId']) ? $_GET['buttonId'] : null;

      if ($selectedBookId && $buttonId) {
          // Rest of your review submission code here
      } else {
          // Handle the case where 'bookId' or 'buttonId' is missing in the URL
          echo 'Error: Book ID or Button ID is missing.';
      }
  } else {
      // Handle the case where 'stars' is not set in the POST data
      echo 'Error: Stars is missing.';
  }
}
?>



<br>
<h1 style="text-align:center; color:white;">Review the Book!</h1>
<form id="ratingForm" method="POST" action="content.php">
  <div class="containerrev">
    <div class="container__items">
      <input type="radio" name="stars" id="st5" value="5">
      <label for="st5">
        <div class="star-stroke">
          <div class="star-fill"></div>
        </div>
        <div class="label-description" data-content="Excellent"></div>
      </label>
      <input type="radio" name="stars" id="st4" value="4">
      <label for="st4">
        <div class="star-stroke">
          <div class="star-fill"></div>
        </div>
        <div class="label-description" data-content="Good"></div>
      </label>
      <input type="radio" name="stars" id="st3" value="3">
      <label for="st3">
        <div class="star-stroke">
          <div class="star-fill"></div>
        </div>
        <div class="label-description" data-content="OK"></div>
      </label>
      <input type="radio" name="stars" id="st2" value="2">
      <label for="st2">
        <div class="star-stroke">
          <div class="star-fill"></div>
        </div>
        <div class="label-description" data-content="Bad"></div>
      </label>
      <input type="radio" name="stars" id="st1" value="1">
      <label for="st1">
        <div class="star-stroke">
          <div class="star-fill"></div>
        </div>
        <div class="label-description" data-content="Terrible"></div>
      </label>
    </div>
  </div>
    </div>
  </div>
  <input type="hidden" name="bookId" value="<?php echo $bookId; ?>">
  <button type="submit" class="btn btn-primary">Submit Review</button>
</form>

<script>
  const ratingForm = document.getElementById('ratingForm');
  const stars = document.querySelectorAll('input[name="stars"]');

  ratingForm.addEventListener('submit', function(event) {
    const selectedStar = [...stars].find(star => star.checked);

    if (!selectedStar) {
      alert('Please select a star rating before submitting.');
      event.preventDefault(); // Prevent the form from submitting if no star is selected
    }
  });
</script>

<?php include 'includes/footer.php'; ?>