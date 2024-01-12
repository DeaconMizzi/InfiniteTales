<?php
    include 'includes/header.php';

    if (isset($_GET['bookId'])) {
        $selectedBookId = $_GET['bookId'];
    
        // Fetch details of the selected book using $selectedBookId
        $selectedBookQuery = "SELECT * FROM book WHERE bookId = '$selectedBookId'";
        $selectedBookResult = mysqli_query($db, $selectedBookQuery);

        if ($selectedBookResult && mysqli_num_rows($selectedBookResult) > 0) {
            $selectedBook = mysqli_fetch_assoc($selectedBookResult);

            $imagePath = 'img/' . strtolower(str_replace(' ', '_', $selectedBook['title'])) . '.png';
    
            echo '<div class="container bg-white mt-5 mb-5 wish">';
            echo '    <div class="row">';
            echo '';
            echo '        <div class="col-md-3 border-right">';
           echo '            <div class="d-flex flex-column align-items-center text-center p-3 py-5"><img width="300px" src="' . $imagePath . '">';
            echo '                <p class="text-right">';
            echo '                    <h1>$' . $selectedBook['price'] .'</h1>';
            echo '                </p>';
            echo '<form method="POST" action="books.php">';

            echo '<button type="submit" class="btn btn-primary addToWishlist" name="add_to_wishlist">Add to Wishlist</button>';
            echo '</form>';
            echo '                <a href="review.php?bookId=<?php echo $selectedBookId; ?>&buttonId=yourButtonId" class="btn btn-primary">Review </a>';
            echo '                <a href="#" class="btn btn-primary name="add_to_cart">Add To Cart</a>';
            echo '            </div>';
            echo '        </div>';
            echo '';
            echo '        <div class="col-md-9 border-right">';
            echo '            <div class="p-3 py-5">';
            echo '                <div class="d-flex justify-content-between align-items-center mb-3">';
            echo '                    <h1 class="text-right">' . $selectedBook['title'] . '</h1>';
            echo '                </div>';
            echo '                <div class="row mt-2">';
            echo '                    <div class="col-md-12">English <br> Author: ' . $selectedBook['author'] . '</div>';
            echo '                    <div class="col-md-6"></div>';
            echo '                </div>';
            echo '                <div class="row mt-3">';
            echo '                    <div class="col-md-12"><p><b>' . $selectedBook['description'] . '</b></p></div>';
            echo '                </div>';
            echo '            </div>';
            echo '        </div>';
            echo '        </div>';

        } else {
            echo 'Book not found';
        }
    } else {
        echo 'Book ID not provided';
    }
?>
       
    </div>
</div>

<br>



<?php
    include 'includes/footer.php';
?>