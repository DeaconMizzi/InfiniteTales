<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Infinite Tales</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="style.css">
    <link href="//netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css" rel="stylesheet">
</head>
<body>

<nav class="navbar navbar-expand-lg bg-light">
    <div class="container-fluid">
        <!-- Left Section -->
        <div class="d-flex align-items-center">
            <img src="img\infinite.png" alt="Logo" width="80" height="100" class="d-inline-block align-text-top">
            <b><a class="navbar-brand" href="index.php">Infinite Tales</a></b>
        </div>

        <!-- Center Section -->
        <div class="d-flex justify-content-center">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="index.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="books.php">Books</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="comingsoon.php">Coming Soon</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        About Us</a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="FAQ.php">FAQ</a>
                        <a class="dropdown-item" href="contact.php">Contact Us</a>
                    </div>
                    </li>

                    <!-- Add more list items as needed -->
                </ul>
            </div>
        </div>

        <!-- Right Section -->
        <div class="d-flex align-items-center">
            <ul class="nav-item dropdown" style = "padding-top:12px; padding-right:10px">
                 <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                 <img src="img\user.png" alt="Logo" width="50" height="50"></a>
                 <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                 <a class="dropdown-item" href="signup.php">Sign Up</a>
                 <a class="dropdown-item" href="signin.php">Sign In</a>
                 <a class="dropdown-item" href="user.php">My Profile</a>
                 <a class="dropdown-item" href="orders.php">My Orders</a>
                 </div>
            </ul>
            <a class="navbar-brand" href="wish.php"><img src="img\wish.png" alt="Logo" width="50" height="50"></a>
            <a class="navbar-brand" href="cart.php"><img src="img\cart.png" alt="Logo" width="40" height="50"></a>
        </div>
    </div>
</nav>
