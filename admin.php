<?php
    include 'includes/header.php';
?>
    <div class="container mt-5">
      <div class="row tm-content-row">
        <div class="col-sm-12 col-md-12 col-lg-8 col-xl-8 tm-block-col">
          <div class="tm-bg-primary-dark tm-block tm-block-products">
            <div class="tm-product-table-container">
              <table class="table table-hover tm-table-small tm-product-table">
                <thead>
                  <tr>
                    <th scope="col">&nbsp;</th>
                    <th scope="col">Product Name</th>
                    <th scope="col">Author</th>
                    <th scope="col">Category</th>
                    <th scope="col">Quantity</th>
                    <th scope="col">Price</th>
                    <th scope="col">&nbsp;</th>
                  </tr>
                </thead>
                <tbody>
                <?php
                      displayBooks($db)
                ?> 
                </tbody>
              </table>
            </div>

            <form method = "post" action="admin.php" style="display: none; border:1px solid #ccc;" class="formSign" id="adminform">
            <?php include('errors.php'); ?>
            <label for="productName">Book Title:</label>
            <input type="text" id="productName" name="title"><br><br>

            <label for="productName">Author:</label>
            <input type="text" id="productName" name="author"><br><br>

            <label for="productName">Category:</label>
            <input type="text" id="productName" name="category"><br><br>

            <label for="productName">Quantity:</label>
            <input type="text" id="productName" name="quantity"><br><br>

            <label for="productName">Price:</label>
            <input type="text" id="productName" name="price"><br><br>

            <label for="productName">Description:</label>
            <input type="text" id="productName" name="description"><br><br>

            <input type="submit" value="Submit" name="add_product">
            </form>
            <br>
            <!-- table container -->
            <button class="btn btn-primary btn-block text-uppercase" id="showFormBtn">
              Add products
            </button>
          </div>
        </div>
      </div>
    </div>
    <br><br><br><br>
<?php
    include 'includes/footer.php';
?>

<script>
    document.getElementById('showFormBtn').addEventListener('click', function() {
        var form = document.getElementById('adminform');
        form.style.display = (form.style.display === 'none') ? 'block' : 'none';
    });
</script>