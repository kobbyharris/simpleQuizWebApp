<!--head section-->
<?php require("../views/partials/main-head.php") ?>
<!--head section-->

<!--header section-->
<?php require('../views/partials/main-header.php'); ?> 
<!-- end of header section-->


<!--main section-->

<main  class="inner-container">

    <?php require('../views/partials/main-navigation.php'); ?>
    

    <!--inner main page-->
    <div class="inner-main-page">

        <!--Greetings-->
        <div class="greetings">

            <?php if(count($_SESSION) > 0): ?>
                <?php if(isset($_SESSION['score'])): ?>
                    <h1>You had: <?php echo $_SESSION['score']; ?></h1>
                <?php endif ?>
            <?php endif ?>

            <?php if(count($_SESSION) == 0): ?>
            <h1>Sign in to continue</h1>
            <?php endif ?>

            <?php if(count($_SESSION) == 0): ?>
                <br>
                <br>
                <div class="details">
                    <p class="signup"><a href="/login"><?= $heading ?></a></p>
                </div>
            <?php die(); endif ?>

            
        </div>
            <!--Greetings-->
            <?php if (isset($_SESSION['score'])): ?>
            <div class="courses-categories">
                <div class="details">
                    <p class="signup"><a href="/courses">Continue test</a></p>
                </div>
            </div>
        <?php endif ?>

    </div>

</main>
<!--end of main section-->


<!--footer section-->
<!--end of footer section-->
</body>
</html>