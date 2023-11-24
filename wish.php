<?php
    include 'includes/header.php';
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
                <th scope="col">Quantity</th>
                <th scope="col">Price</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <th scope="row">
                  <div class="d-flex align-items-center">
                    <img src="img\mp.jpg" class="img-fluid rounded-3"
                      style="width: 120px;" alt="Book">
                    <div class="flex-column ms-4">
                      <p class="mb-2">Friends, Lovers and the Big Terrible Thing: "Funny, fascinating and compelling" The Times</p>
                      <p class="mb-0">Matthew Perry</p>
                    </div>
                  </div>
                </th>
                <td class="align-middle">
                  <p class="mb-0" style="font-weight: 500;">Paperback</p>
                </td>
                <td class="align-middle">
                  <div class="d-flex flex-row">
                    <button class="btn btn-link px-2"
                      onclick="this.parentNode.querySelector('input[type=number]').stepDown()">
                      <i class="fas fa-minus"></i>
                    </button>

                    <input id="form1" min="0" name="quantity" value="1" type="number"
                      class="form-control form-control-sm" style="width: 50px;" />

                    <button class="btn btn-link px-2"
                      onclick="this.parentNode.querySelector('input[type=number]').stepUp()">
                      <i class="fas fa-plus"></i>
                    </button>
                  </div>
                </td>
                <td class="align-middle">
                  <p class="mb-0" style="font-weight: 500;">$12.00</p>
                </td>
              </tr>
              <tr>
                <th scope="row" class="border-bottom-0">
                  <div class="d-flex align-items-center">
                    <img src="img\opvol104.png" class="img-fluid rounded-3"
                      style="width: 120px;" alt="Book">
                    <div class="flex-column ms-4">
                      <p class="mb-2">One Piece Vol. 104</p>
                      <p class="mb-0">Eiichiro Oda</p>
                    </div>
                  </div>
                </th>
                <td class="align-middle border-bottom-0">
                  <p class="mb-0" style="font-weight: 500;">Paperback</p>
                </td>
                <td class="align-middle border-bottom-0">
                  <div class="d-flex flex-row">
                    <button class="btn btn-link px-2"
                      onclick="this.parentNode.querySelector('input[type=number]').stepDown()">
                      <i class="fas fa-minus"></i>
                    </button>

                    <input id="form1" min="0" name="quantity" value="1" type="number"
                      class="form-control form-control-sm" style="width: 50px;" />

                    <button class="btn btn-link px-2"
                      onclick="this.parentNode.querySelector('input[type=number]').stepUp()">
                      <i class="fas fa-plus"></i>
                    </button>
                  </div>
                </td>
                <td class="align-middle border-bottom-0">
                  <p class="mb-0" style="font-weight: 500;">$12.00</p>
                </td>
              </tr>
            </tbody>
          </table>
        </div>
</section>

<?php
    include 'includes/footer.php';
?>