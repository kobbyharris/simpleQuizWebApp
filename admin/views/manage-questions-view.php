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
            <h1>Manage Questions</h1>
            <p>Edit and delete questions</p>
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
        <form class="form-section" action="/add" method="post">
            
            <div class="achieve-one">
                <?php if(isset($questions)): ?>
                    <?php foreach ($questions as $question): ?>
                        <label for="category_id"><?= htmlspecialchars($question['question_id']) ?></label>
                        <label for="category_id"><?= htmlspecialchars( $question['question_text']) ?></label>
                        <label for="addquestions"><a class="options" href="/edit_question?id=<?= htmlspecialchars($question['question_id']) ?>">Edit</a></label>
                        <label for="addquestions"><a class="options" href="/delete?id=<?= htmlspecialchars($question['question_id']) ?>" onclick="return confirm('Are you sure you want to delete this question?')">Delete</a></label>
                    <?php endforeach ?>
                <?php endif ?>    
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




