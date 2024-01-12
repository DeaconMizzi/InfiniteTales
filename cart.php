<?php
    include 'includes/header.php';

    $user_id = $_SESSION['user_id'];
    $cart_query = "SELECT cart.cartId, cart.quantity, cart.price, book.title, book.author, book.category
                   FROM cart
                   JOIN book ON cart.bookId = book.bookId
                   WHERE cart.accountId = $user_id";
    $cart_result = mysqli_query($db, $cart_query);
?>

<section class="h-100 h-custom">
  <div class="container h-100 py-5">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col">

        <div class="table-responsive">
          <table class="table">
            <thead>
              <tr>
                <th scope="col" class="h5">Shopping Bag</th>
                <th scope="col">Format</th>
                <th scope="col">Quantity</th>
                <th scope="col">Price</th>
                <th scope="col">Remove</th>
              </tr>
            </thead>
            <tbody>
              <?php
                  while ($cart_row = mysqli_fetch_assoc($cart_result)) {
                      echo "<tr>";
                      echo "<th scope='row'>";
                      echo '<div class="d-flex align-items-center">';
                      // You can modify this to dynamically generate the image path based on book details
                      echo '<img src="img/' . strtolower(str_replace(' ', '_', $cart_row['title'])) . '.png" class="img-fluid rounded-3" style="width: 120px;" alt="Book">';
                      echo '<div class="flex-column ms-4">';
                      echo '<p class="mb-2">' . $cart_row['title'] . '</p>';
                      echo '<p class="mb-0">' . $cart_row['author'] . '</p>';
                      echo '</div>';
                      echo '</div>';
                      echo "</th>";
                      echo '<td class="align-middle">';
                      echo '<p class="mb-0" style="font-weight: 500;">' . $cart_row['category'] . '</p>';
                      echo '</td>';
                      echo '<td class="align-middle">';
                      echo '<p class="mb-0" style="font-weight: 500;">' . $cart_row['quantity'] . '</p>';
                      echo '</div>';
                      echo '</td>';
                      echo '<td class="align-middle">';
                      echo '<p class="mb-0" style="font-weight: 500;">$' . $cart_row['price'] . '</p>';
                      echo '</td>';
                      echo '<td class="align-middle">';
                      echo '<form method="POST" action="cart.php">';
                      echo '<input type="hidden" name="cart_id" value="' . $cart_row['cartId'] . '">';
                      echo '<button type="submit" class="btn btn-danger removeFromCart" name="remove_from_cart">Remove</button>';
                      echo '</form>';
                      echo '</td>';
                      echo "</tr>";


                  }

                  $user_id = $_SESSION['user_id'];
              $cart_query = "SELECT cart.cartId, cart.quantity, cart.price, book.bookId, book.title, book.author, book.category
                            FROM cart
                            JOIN book ON cart.bookId = book.bookId
                            WHERE cart.accountId = $user_id";

              $cart_result = mysqli_query($db, $cart_query);
              $subTotal = calculateSubtotal($db);

              // Hardcoded shipping cost for example
              $shippingCost = 2.99;
              
              // Calculate the total including shipping
              $totalAmount = $subTotal + $shippingCost;

              function getAddressId($db, $user_id) {
                $address_query = "SELECT addressId FROM users WHERE accountId = $user_id";
                $address_result = mysqli_query($db, $address_query);
            
                if ($row = mysqli_fetch_assoc($address_result)) {
                    return $row['addressId'];
                }
            
                return null;
            }

            if ($_SERVER['REQUEST_METHOD'] === 'POST') {

                  // Form fields are valid, proceed with the order
                  $addressId = getAddressId($db, $user_id);
          
                  // Start a transaction
                  mysqli_begin_transaction($db);
          
                  // Insert order details
                  $insert_order_query = "INSERT INTO orders (bookId, accountId, quantity, totalprice, addressId)
                                        VALUES (?, ?, ?, ?, ?)";
                  $insert_order_stmt = mysqli_prepare($db, $insert_order_query);
                  
                  while ($cart_row = mysqli_fetch_assoc($cart_result)) {
                      // Bind parameters
                      mysqli_stmt_bind_param($insert_order_stmt, "iiidi", $cart_row['bookId'], $user_id, $cart_row['quantity'], $totalAmount, $addressId);
          
                      // Execute the statement
                      mysqli_stmt_execute($insert_order_stmt);
          
                      // Update book quantity (subtract ordered quantity)
                      $update_book_query = "UPDATE book SET quantity = quantity - ? WHERE bookId = ?";
                      $update_book_stmt = mysqli_prepare($db, $update_book_query);
                      mysqli_stmt_bind_param($update_book_stmt, "ii", $cart_row['quantity'], $cart_row['bookId']);
                      mysqli_stmt_execute($update_book_stmt);
                  }
          
                  // Commit the transaction
                  mysqli_commit($db);
          
                  // Clear the user's cart
                  $clear_cart_query = "DELETE FROM cart WHERE accountId = $user_id";
                  mysqli_query($db, $clear_cart_query);
          
                  // Provide feedback to the user (success message or redirect to a confirmation page)
                  echo '<div class="alert alert-success" role="alert">Order placed successfully!</div>';
              }
          
              ?>
            </tbody>
          </table>
        </div>

        <div class="card shadow-2-strong mb-5 mb-lg-0" style="border-radius: 16px;">
          <div class="card-body p-4">

            <div class="row">
              <div class="col-md-6 col-lg-4 col-xl-3 mb-4 mb-md-0">
                
                  <div class="d-flex flex-row pb-3">
                    <div class="d-flex align-items-center pe-2">
                      <input class="form-check-input" type="radio" name="radioNoLabel" id="radioNoLabel1v"
                        value="" aria-label="..." checked />
                    </div>
                    <div class="rounded border w-100 p-3">
                      <p class="d-flex align-items-center mb-0">
                        <i class="fab fa-cc-mastercard fa-2x text-dark pe-2"></i>Credit
                        Card
                      </p>
                    </div>
                  </div>
                  <div class="d-flex flex-row pb-3">
                    <div class="d-flex align-items-center pe-2">
                      <input class="form-check-input" type="radio" name="radioNoLabel" id="radioNoLabel2v"
                        value="" aria-label="..." />
                    </div>
                    <div class="rounded border w-100 p-3">
                      <p class="d-flex align-items-center mb-0">
                        <i class="fab fa-cc-visa fa-2x fa-lg text-dark pe-2"></i>Debit Card
                      </p>
                    </div>
                  </div>
                  <div class="d-flex flex-row">
                    <div class="d-flex align-items-center pe-2">
                      <input class="form-check-input" type="radio" name="radioNoLabel" id="radioNoLabel3v"
                        value="" aria-label="..." />
                    </div>
                    <div class="rounded border w-100 p-3">
                      <p class="d-flex align-items-center mb-0">
                        <i class="fab fa-cc-paypal fa-2x fa-lg text-dark pe-2"></i>PayPal
                      </p>
                    </div>
                  </div>
              </div>
              <div class="col-md-6 col-lg-4 col-xl-6">
                <div class="row">
                  <div class="col-12 col-xl-6">
                    <div class="form-outline mb-4 mb-xl-5">
                      <input type="text" id="typeName" class="form-control form-control-lg" siez="17"
                        placeholder="John Smith" />
                      <label class="form-label" for="typeName">Name on card</label>
                    </div>

                    <div class="form-outline mb-4 mb-xl-5">
                      <input type="text" id="typeExp" class="form-control form-control-lg" placeholder="MM/YY"
                        size="7" id="exp" minlength="7" maxlength="7" />
                      <label class="form-label" for="typeExp">Expiration</label>
                    </div>
                  </div>
                  <div class="col-12 col-xl-6">
                    <div class="form-outline mb-4 mb-xl-5">
                      <input type="text" id="typeText" class="form-control form-control-lg" siez="17"
                        placeholder="1111 2222 3333 4444" minlength="19" maxlength="19" />
                      <label class="form-label" for="typeText">Card Number</label>
                    </div>

                    <div class="form-outline mb-4 mb-xl-5">
                      <input type="password" id="typeText" class="form-control form-control-lg"
                        placeholder="&#9679;&#9679;&#9679;" size="1" minlength="3" maxlength="3" />
                      <label class="form-label" for="typecvv">Cvv</label>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-lg-4 col-xl-3">
                  <div class="d-flex justify-content-between" style="font-weight: 500;">
                      <p class="mb-2">Subtotal</p>
                      <p class="mb-2">$<?php echo number_format($subTotal, 2); ?></p>
                  </div>
              
                  <div class="d-flex justify-content-between" style="font-weight: 500;">
                      <p class="mb-0">Shipping</p>
                      <p class="mb-0">$<?php echo number_format($shippingCost, 2); ?></p>
                  </div>
              
                  <hr class="my-4">
              
                  <div class="d-flex justify-content-between mb-4" style="font-weight: 500;">
                      <p class="mb-2">Total</p>
                      <p class="mb-2">$<?php echo number_format($totalAmount, 2); ?></p>
                  </div>
                  
                  <a href="books.php">
                  <button type="button" class="btn btn-primary btn-block btn-lg">
                   
                      <div class="d-flex justify-content-between">
                          <span>Cancel </span>
                      </div>
                  </button>
                  </a>
                  <form method="POST" action="cart.php">
                      <button type="submit" class="btn btn-primary btn-block btn-lg">
                          <div class="d-flex justify-content-between">
                              <span>Checkout </span>
                          </div>
                      </button>
                  </form>

              </div>
            </div>

          </div>
        </div>

      </div>
    </div>
  </div>
</section>
<br>
<?php
    include 'includes/footer.php';
?>