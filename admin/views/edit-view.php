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
            <h1>Edit Questions</h1>
            <p><?= htmlspecialchars(":)")?></p>
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
        <form class="form-section" action="/update" method="post">
            
            <div class="achieve-one">

                <input type="hidden" name="question_id" value="<?= $questionId ?>">
                <label for="question_text">Question Text:</label><br>
                <textarea name="question_text" id="question_text" rows="3" cols="50" required><?= htmlspecialchars($questionText) ?></textarea><br>
                
            </div>

            <div class="achieve-one">
                <button id="addquestions" type="submit"></button>
                <label for="addquestions">Update Question</label>
            </div>
            
            <div class="achieve-one">
                <label for="addquestions"><a href="/ManageQ">Cancel</a></label>
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




