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
            <h1>Add a category</h1>
            <p><?= htmlspecialchars("Fill out the input field")?></p>
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


        <!--Add section-->
        <form class="form-section" action="/addcategory" method="post">
            
            <div class="achieve-one">

            <label for="category_name">Category Name:</label><br>
            <input type="text" id="category_name" name="category_name" required><br><br>

            </div>

            <div class="achieve-one">
                <button id="addquestions" type="submit"></button>
                <label for="addquestions">Add Category</label>
            </div>
            
        </form>
        <!-- End of add section section-->
    </div>

</main>
<!--end of main section-->


<!--footer section-->
<!--end of footer section-->
</body>
</html>




