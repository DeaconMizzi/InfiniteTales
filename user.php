<?php
    include 'includes/header.php';

    // Fetch user's address details if available
    $user_id = $_SESSION['user_id'];
    $address_query = "SELECT * FROM address INNER JOIN users ON address.addressId = users.addressId WHERE users.accountId = $user_id";
    $address_result = mysqli_query($db, $address_query);
    $address = mysqli_fetch_assoc($address_result);

    // Initialize variables to hold address details
    $house = "";
    $street = "";
    $code = "";
    $town = "";

    // If address details exist, assign them to respective variables
    if ($address) {
        $house = $address['houseNumber'];
        $street = $address['street'];
        $code = $address['postCode'];
        $town = $address['town'];
    }
?>

<div class="container bg-white mt-5 mb-5 wish">
    <div class="row">
        <div class="col-md-3 border-right">
            <div class="d-flex flex-column align-items-center text-center p-3 py-5"><img class="rounded-circle mt-5" width="150px" src="img\user.png"><span class="font-weight-bold">
                <?php       
                    echo "{$_SESSION['username']}";
                ?>
                </span><span></span>
            </div>
        </div>
        <div class="col-md-5 border-right">
            <div class="p-3 py-5">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h4 class="text-right">Profile Settings</h4>
                </div>
                <form method="post" action="server.php">
                    <?php include('errors.php'); ?>
                    <div class="container">

                        <label for="email"><b>House Number</b></label>
                        <input type="text" placeholder="Enter House Number" name="houseNum" value="<?php echo $house; ?>" required>

                        <label for="email"><b>Street</b></label>
                        <input type="text" placeholder="Enter Street" name="street" value="<?php echo $street; ?>" required>

                        <label for="psw"><b>Post Code</b></label>
                        <input type="text" placeholder="Enter Post Code" name="postCode" value="<?php echo $code; ?>" required>

                        <label for="psw-repeat"><b>Town</b></label>
                        <input type="text" placeholder="Enter Town" name="town" value="<?php echo $town; ?>" required>

                        <div class="clearfix">
                            <button type="submit" class="signupbtn" name="update_profile">Update Profile</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?php
    include 'includes/footer.php';
?>