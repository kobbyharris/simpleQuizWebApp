<!--head section-->
<?php require("partials/main-head.php") ?>
<!--head section-->

<!--header section-->
<?php require('partials/main-header.php'); ?> 
<!-- end of header section-->


<!--main section-->

<main  class="inner-container">

    <?php require('partials/main-navigation.php'); ?>
    

    <!--inner main page-->
    <div class="inner-main-page">

        <!--Greetings-->
        <div class="greetings">

            <?php if(isset($_SESSION['admin_id'])): ?>
            <h1>Hi <?php if(isset($_SESSION['username'])){echo $_SESSION['username'];}?>!</h1>
            <p>Manage everything here</p>
            <?php endif ?>

            <?php if(!isset($_SESSION['admin_id'])): ?>
            <h1>Sign in to continue</h1>
            <?php endif ?>

            <?php if(!isset($_SESSION['admin_id'])): ?>
                <br>
                <br>
            <div class="details">
                <p class="signup"><a href="/login"><?= $heading ?></a></p>
            </div>
            <?php die(); endif ?>

            
        </div>
            <!--Greetings-->


            <!--Data-->
        <div class="achievements">

            <div class="achieve-one">
                <p>Total Admin Users</p>
                <h2><?php echo htmlspecialchars($totalAdminUsers) ?></h2>
            </div>

            <div class="achieve-two">
                <p>Total Course Categories</p>
                <h2><?php echo htmlspecialchars($totalCategories) ?></h2>
            </div>
        </div>
        <!-- End of Achievements section-->
    </div>

</main>
<!--end of main section-->


<!--footer section-->
<!--end of footer section-->
</body>
</html>