<!-- Header -->
<?php 
    session_start();
    require_once("includes/header.php");
        //check if session["error"] exists
    session_unset(); // Unset all session variables
    session_destroy(); // Destroy the session completely

header("Location: login.php"); // Redirect to the login page after logging out
exit();

    ?>




    <!-- Navbar -->
    <?php require_once("includes/navbar.php") ?>


    <div class="container vh-100 d-flex justify-content-center align-items-center">
        <div class="card text-center shadow p-3" style="width: 24rem;">
            <div class="card-body">
                <h5 class="card-title">You have been logged out</h5>
                <p class="card-text">Thank you for visiting. You are now logged out.</p>
                <a href="/login.php" class="btn btn-primary">Go to Login</a>
            </div>
        </div>
    </div>

<?php require_once("includes/footer.php") ?>
<!-- Bootstrap 5 JS Bundle -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>