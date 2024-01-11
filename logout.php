<?php include('server.php') ?>
<?php
// Start the session
    session_start();

    // Check if the user is logged in
    if (isset($_SESSION['username'])) {
        // If the user is logged in, perform logout actions
        session_destroy(); // Destroy all session data

        // Redirect the user to the sign-in page or any other desired page after logout
        header("Location: index.php");
        exit();
    }
?>