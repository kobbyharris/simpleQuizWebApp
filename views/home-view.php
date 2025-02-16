<!--head section-->
<?php require("../views/partials/main-head.php") ?>
<!--head section-->

<!--header section-->
<?php require('../views/partials/main-header.php'); ?> 
<!-- end of header section-->


<!--main section-->

<main class="inner-container">

    <?php require('../views/partials/main-navigation.php'); ?>
    

    <!--inner main page-->
    <div class="inner-main-page">

        <!--Greetings-->
        <div class="greetings">

            <?php if(count($_SESSION) > 0): ?>
            <h1>Welcome back <?=$_SESSION['username']?>!</h1>
            <p>We are glad to have you back on PQuiz</p>
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


            <!--Achievements-->
        <div class="achievements">

            <div class="achieve-one">
                <p>Rank</p>
                <h2><?php echo htmlspecialchars($achievement) ?></h2>
            </div>

            <div class="achieve-two">
                <p>Total Scores</p>
                <h2><?php echo htmlspecialchars($score); ?></h2>
            </div>

            <div class="achieve-two">
                <h2><?php echo htmlspecialchars($compliment); ?></h2>
            </div>
        </div>
        <!-- End of Achievements section-->

        <div class="courses-categories">
            <div class="details">
                <p class="signup"><a href="/courses">START NOW</a></p>
            </div>
        </div>


    </div>

</main>
<!--end of main section-->


<!--footer section-->
<!--end of footer section-->
</body>
</html>