<?php
    include 'includes/header.php';
?>
  <section id="books">
    <h2 style="text-align:center;color: white;text-decoration:underline white;">Latest Releases</h2> 
    <br>
    <div class="book-list">
          <?php
            // Generate book cards
            $sql = "SELECT * FROM book";
            $result = mysqli_query($db, $sql);

            if ($result && mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    generateBookCard($row, $db);
                }
            } else {
                echo "No books available.";
            }
            ?>     
    </div>
  </section>

  


<?php
    include 'includes/footer.php';
?>