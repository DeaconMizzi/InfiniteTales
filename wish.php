<?php
    include 'includes/header.php';

    // Fetch wishlist items for the logged-in user
    $user_id = $_SESSION['user_id'];
    $wishlist_query = "SELECT * FROM wishlist INNER JOIN book ON wishlist.bookId = book.bookId WHERE wishlist.accountId = $user_id";
    $wishlist_result = mysqli_query($db, $wishlist_query);
?>

<br>
<section class="h-100 h-custom">
  <div class="container h-100 py-5 wish">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col">

        <div class="table-responsive">
          <table class="table">
            <thead>
              <tr>
                <th scope="col" class="h5">Wishlist</th>
                <th scope="col">Format</th>
                <th scope="col">Price</th>
                <th scope="col">Buy</th>
                <th scope="col">Remove</th>
              </tr>
            </thead>
            <tbody>
              <?php
                while ($row = mysqli_fetch_assoc($wishlist_result)) {
                  echo "<tr>";
                  echo "<th scope='row'>";
                  echo '<div class="d-flex align-items-center">';
                  echo '<img src="img/' . strtolower(str_replace(' ', '_', $row['title'])) . '.png" class="img-fluid rounded-3" style="width: 120px;" alt="Book">';
                  echo '<div class="flex-column ms-4">';
                  echo '<p class="mb-2">' . $row['title'] . '</p>';
                  echo '<p class="mb-0">' . $row['author'] . '</p>';
                  echo '</div>';
                  echo '</div>';
                  echo "</th>";
                  echo '<td class="align-middle">';
                  echo '<p class="mb-0" style="font-weight: 500;">' . $row['category'] . '</p>';
                  echo '</td>';
                  echo '<td class="align-middle">';
                  echo '<p class="mb-0" style="font-weight: 500;">$' . $row['price'] . '</p>';
                  echo '</td>';
                  echo '<td class="align-middle">';
                  echo '<form method="POST" action="cart.php">';
                  echo '<input type="hidden" name="book_id" value="' . $row['bookId'] . '">';
                  echo '<button type="submit" class="btn btn-primary addToCart" name="add_to_cart">Add To Cart</button>';
                  echo '</form>';
                  echo '</td>';
                  echo '<td class="align-middle">';
                  echo '<form method="POST" action="wish.php">';
                  echo '<input type="hidden" name="book_id" value="' . $row['bookId'] . '">';
                  echo '<button type="submit" class="btn btn-primary removeFromWishlist" name="remove_from_wishlist"><img src="img\wish.png" alt="Logo" width="20" height="20"></button>';
                  echo '</form>';
                  echo '</td>';
                  echo '</tr>';
              }
              ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</section>

<?php
    include 'includes/footer.php';
?>