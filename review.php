<?php
include 'includes/header.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Check if the 'stars' field is set in the POST data
    if (isset($_POST['stars'])) {
        // Get the selected star rating
        $selectedRating = $_POST['stars'];

        // Check if the user is logged in (adjust the condition based on your authentication logic)
        if (isset($_SESSION['user_id'])) {
            // Get the current user ID from the session
            $userId = $_SESSION['user_id'];

            // Check if the 'bookId' is set in the POST data
            if (isset($_POST['bookId'])) {
                // Get the 'bookId' from the POST data
                $productId = $_POST['bookId'];

                // Insert the review into the 'reviews' table
                $insertReviewQuery = "INSERT INTO reviews (stars, user_id, product_id) VALUES (?, ?, ?)";
                $stmt = $db->prepare($insertReviewQuery);

                // Bind parameters and execute the query
                $stmt->bind_param("iii", $selectedRating, $userId, $productId);
                $stmt->execute();

                // Close the statement (you can keep the database connection open for subsequent queries if needed)
                $stmt->close();

                // Redirect to the page you want after the review is submitted
                header("Location: books.php");
                exit();
            } else {
                // Handle the case where 'bookId' is not set in the POST data
                // Redirect to an error page or display an error message
                echo 'Error: Book ID is missing.';
            }
        } else {
            // Handle the case where the user is not logged in
            // Redirect to the login page or display a login prompt
            echo 'Error: User not logged in.';
        }
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