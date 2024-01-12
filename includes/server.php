<?php
session_start();

// initializing variables
$username = "";
$email    = "";
$house    = "";
$street   = "";
$code     = "";
$town     = "";
$title    = "";
$author   = "";
$category = "";
$quantity = "";
$price    = "";
$description = "";
$errors = array(); 

// connect to the database
$db = mysqli_connect('localhost', 'root', '', 'infinitetales');

if (isset($_POST['add_product']))
{
    $title = mysqli_real_escape_string($db, $_POST['title']);
    $author = mysqli_real_escape_string($db, $_POST['author']);
    $category = mysqli_real_escape_string($db, $_POST['category']);
    $quantity = mysqli_real_escape_string($db, $_POST['quantity']);
    $price = mysqli_real_escape_string($db, $_POST['price']);
    $description = mysqli_real_escape_string($db, $_POST['description']);

    $book_check_query = "SELECT * FROM book WHERE title='$title' LIMIT 1";
    $result = mysqli_query($db, $book_check_query);
    $book = mysqli_fetch_assoc($result);
  
    if ($book) { // if book exists
        if ($book['title'] === $title) {
            array_push($errors, "Book already exists");
        }

    }

    if (count($errors) == 0) {
        $query = "INSERT INTO book (title, author, category, quantity, price, description) 
                  VALUES('$title', '$author', '$category', '$quantity', '$price', '$description')";
        mysqli_query($db, $query);
        $_SESSION['username'] = $username;
        $_SESSION['success'] = "Book added to database";
        header('location: admin.php');
    }
}

if (isset($_POST['delete_book'])) {
    $book_id_to_delete = $_POST['book_id'];
    $delete_query = "DELETE FROM book WHERE bookId = '$book_id_to_delete'";
    if (mysqli_query($db, $delete_query)) {
        echo "<script>alert('Record deleted successfully');</script>";
        header("Refresh:0"); // Refresh the page after deletion
        exit();
    } else {
        echo "Error deleting record: " . mysqli_error($db);
    }
}

$sql = "SELECT * FROM book";
$result = mysqli_query($db, $sql);

// Display Book Table
function displayBooks($db) {
    // Fetch data from the book table
    $sql = "SELECT * FROM book";
    $result = mysqli_query($db, $sql);

    // Display Book Table
    if (mysqli_num_rows($result) > 0) {
        // Output data of each row
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>";
            echo "<th scope='row'><input type='checkbox' /></th>";
            echo "<td class='tm-product-name'>" . $row['title'] . "</td>";
            echo "<td>" . $row['author'] . "</td>";
            echo "<td>" . $row['category'] . "</td>";
            echo "<td>" . $row['quantity'] . "</td>";
            echo "<td>" . $row['price'] . "</td>";
            echo "<td>";
            echo "<form method='POST' action='admin.php'>";
            echo "<input type='hidden' name='book_id' value='" . $row['bookId'] . "'>";
            echo "<button class='btn btn-primary btn-block text-uppercase mb-3' name='delete_book'>Delete</button>";
            echo "</form>";
            echo "</td>";
            echo "</tr>";
        }
    } else {
        echo "0 results";
    }

    
}

function generateBookCard($row)
{
    // Generate image path based on the title
    $imagePath = 'img/' . strtolower(str_replace(' ', '_', $row['title'])) . '.png';
    echo '<div class="card" style="width: 20rem;" data-book-id="' . $row['bookId'] . '">';
    echo '<a class="nav-link" href="content.php?bookId=' . $row['bookId'] . '"><img src="' . $imagePath. '" class="card-img-top" alt="..." style="height:30rem;"></a>';
    echo '<div class="card-body" style="text-align:center">';
    echo '<h5 class="card-title">' . $row['title'] . '</h5>';
    echo '<p class="card-text">';
    echo 'Author: ' . $row['author'] . '<br> <br>';
    echo 'Category: ' . $row['category'] . '<br>';
    echo 'Quantity: ' . $row['quantity'] . '<br>';
    echo 'Price: $' . $row['price'] . '<br>';
    echo '</p>';
    // Your star rating code here

    echo '<form method="POST" action="books.php">';
    echo '<input type="hidden" name="book_id" value="' . $row['bookId'] . '">';
    echo '<button type="submit" class="btn btn-primary addToWishlist" name="add_to_wishlist">Add to Wishlist</button>';
    echo '</form>';
    echo '<form method="POST" action="cart.php">';
    echo '<input type="hidden" name="book_id" value="' . $row['bookId'] . '">';
    echo '<button type="submit" class="btn btn-primary addToCart" name="add_to_cart">Add To Cart</button>';
    echo '</form>';
    echo '</div>';
    echo '</div>';
}

if (isset($_POST['add_to_wishlist'])) {
    $user_id = $_SESSION['user_id'];
    $book_id = mysqli_real_escape_string($db, $_POST['book_id']);

    // Check if the book is already in the wishlist
    $wishlist_check_query = "SELECT * FROM wishlist WHERE accountId=$user_id AND bookId=$book_id";
    $wishlist_result = mysqli_query($db, $wishlist_check_query);
    $existing_wishlist_item = mysqli_fetch_assoc($wishlist_result);

    if (!$existing_wishlist_item) {
        // Book is not in the wishlist, so add it
        $insert_wishlist_query = "INSERT INTO wishlist (accountId, bookId, quantity) VALUES ($user_id, $book_id, 1)";
        mysqli_query($db, $insert_wishlist_query);
        $_SESSION['success'] = "Book added to wishlist";
    } else {
        // Book is already in the wishlist, you can handle this case as needed
        $_SESSION['error'] = "Book is already in your wishlist";
    }

    // Redirect back to the previous page or wishlist page
    header('location: ' . $_SERVER['HTTP_REFERER']);
    exit();
}

if (isset($_POST['remove_from_wishlist'])) {
    $user_id = $_SESSION['user_id'];
    $book_id = mysqli_real_escape_string($db, $_POST['book_id']);

    // Remove the book from the wishlist
    $remove_wishlist_query = "DELETE FROM wishlist WHERE accountId=$user_id AND bookId=$book_id";
    mysqli_query($db, $remove_wishlist_query);

    // Redirect back to the wishlist page
    header('location: wish.php');
    exit();
}

if (isset($_POST['add_to_cart'])) {
    $user_id = $_SESSION['user_id'];
    $book_id = mysqli_real_escape_string($db, $_POST['book_id']);

    // Check if the book is already in the cart
    $cart_check_query = "SELECT * FROM cart WHERE accountId=$user_id AND bookId=$book_id";
    $cart_result = mysqli_query($db, $cart_check_query);
    $existing_cart_item = mysqli_fetch_assoc($cart_result);

    if ($existing_cart_item) {
        // Book is already in the cart, so update the quantity
        $new_quantity = $existing_cart_item['quantity'] + 1;
        $update_cart_query = "UPDATE cart SET quantity=$new_quantity WHERE accountId=$user_id AND bookId=$book_id";
        mysqli_query($db, $update_cart_query);
    } else {
        // Book is not in the cart, so add it
        $insert_cart_query = "INSERT INTO cart (accountId, bookId, quantity) VALUES ($user_id, $book_id, 1)";
        mysqli_query($db, $insert_cart_query);
    }

    // Redirect back to the previous page or wishlist page
    header('location: ' . $_SERVER['HTTP_REFERER']);
    exit();
}

// REGISTER USER
if (isset($_POST['reg_user'])) {
    // receive all input values from the form
    $username = mysqli_real_escape_string($db, $_POST['username']);
    $email = mysqli_real_escape_string($db, $_POST['email']);
    $password_1 = mysqli_real_escape_string($db, $_POST['password_1']);
    $password_2 = mysqli_real_escape_string($db, $_POST['password_2']);

    // form validation: ensure that the form is correctly filled ...
    // by adding (array_push()) corresponding error unto $errors array
    if (empty($username)) { array_push($errors, "Username is required"); }
    if (empty($email)) { array_push($errors, "Email is required"); }
    if (empty($password_1)) { array_push($errors, "Password is required"); }
    if ($password_1 != $password_2) {
        array_push($errors, "The two passwords do not match");
    }

    // first check the database to make sure 
    // a user does not already exist with the same username and/or email
    $user_check_query = "SELECT * FROM users WHERE username='$username' OR email='$email' LIMIT 1";
    $result = mysqli_query($db, $user_check_query);
    $user = mysqli_fetch_assoc($result);
  
    if ($user) { // if user exists
        if ($user['username'] === $username) {
            array_push($errors, "Username already exists");
        }

        if ($user['email'] === $email) {
            array_push($errors, "email already exists");
        }
    }

    // Finally, register user if there are no errors in the form
    if (count($errors) == 0) {
        $password = $password_1;

        $query = "INSERT INTO users (username, email, password) 
                  VALUES('$username', '$email', '$password')";
        mysqli_query($db, $query);
        $_SESSION['success'] = "You are now logged in";
        header('location: index.php');
    }
}

// LOGIN USER
if (isset($_POST['login_user'])) {
    $username = mysqli_real_escape_string($db, $_POST['username']);
    $password = mysqli_real_escape_string($db, $_POST['password']);

    if (empty($username)) {
        array_push($errors, "Username is required");
    }
    if (empty($password)) {
        array_push($errors, "Password is required");
    }

    if (count($errors) == 0) {
        $query = "SELECT * FROM users WHERE username='$username' AND password='$password'";
        $results = mysqli_query($db, $query);
        if (mysqli_num_rows($results) == 1) {
            $_SESSION['username'] = $username;
            $_SESSION['success'] = "You are now logged in";
            $user = mysqli_fetch_assoc($results);
            $_SESSION['user_id'] = $user['accountId'];
            header('location: index.php');
        } else {
            array_push($errors, "Wrong username/password combination");
        }
    }
}

if (isset($_POST['update_profile'])) {
  $user_id = $_SESSION['user_id'];
  $house = mysqli_real_escape_string($db, $_POST['houseNum']);
  $street = mysqli_real_escape_string($db, $_POST['street']);
  $code = mysqli_real_escape_string($db, $_POST['postCode']);
  $town = mysqli_real_escape_string($db, $_POST['town']);

  if (count($errors) == 0) {
      // Check if the user already has an address
      $address_query = "SELECT * FROM address INNER JOIN users ON address.addressId = users.addressId WHERE users.accountId = $user_id";
      $address_result = mysqli_query($db, $address_query);
      $existing_address = mysqli_fetch_assoc($address_result);

      if ($existing_address) {
          $addressId = $existing_address['addressId'];
          $update_address_query = "UPDATE address SET houseNumber='$house', street='$street', postCode='$code', town='$town' WHERE addressId=$addressId";

          if (mysqli_query($db, $update_address_query)) {
              $_SESSION['success'] = "Address updated successfully";
              header('location: index.php');
              exit();
          } else {
              echo "Error updating address: " . mysqli_error($db);
          }
      } else {
          $insert_address_query = "INSERT INTO address (houseNumber, street, postCode, town) VALUES ('$house', '$street', '$code', '$town')";
          if (mysqli_query($db, $insert_address_query)) {
              $addressId = mysqli_insert_id($db);

              $update_user_query = "UPDATE users SET addressId = $addressId WHERE accountId = $user_id";
              if (mysqli_query($db, $update_user_query)) {
                  $_SESSION['success'] = "Address added successfully";
                  header('location: user.php');
                  exit();
              } else {
                  echo "Error updating user with address: " . mysqli_error($db);
              }
          } else {
              echo "Error inserting address: " . mysqli_error($db);
          }
      }
  }
}
?>