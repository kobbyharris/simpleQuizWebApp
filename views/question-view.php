<!--head section-->
<?php require("../views/partials/main-head.php") ?>
<!--head section-->

<?php if (isset($_SESSION['errors'])): ?>
    <!--errorbox section-->
    <div style="-webkit-animation-name:popupErrorBox; display: flex; -moz-animation-name:popupErrorBox; ;animation-name: popupErrorBox;" class="errorBox">
        <?=htmlspecialchars($_SESSION['errors']); ?>
        <?php $_SESSION['errors'] = null; ?>
    </div>
    <!--end of errorbox-->
<?php endif ?>

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
            <h1>Have Fun</h1>
            <p>Practice makes a man perfect</p>
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

        <!--question section-->
        <div class="achievements">
                <?php if(isset($error)): ?>
                    <p><?= $error ?></p>
                <?php endif ?>
            <form action="/verify" class="form-section" method="post">
                <div class="achieve-one">
                    <?php $previous_question_id = null; foreach ($questions as $question): ?>
                        <?php if ($question['question_id'] !== $previous_question_id): ?>
                            <p><?php echo htmlspecialchars( $question['question_text']); ?></p>
                        <?php endif; ?>
                        <input type="hidden" name="user_id" value="<?php $_SESSION['user_id']?>">
                        <input type="radio" name="answers[<?php echo $question['question_id']; ?>]" value="<?php echo $question['choice_id']; ?>">
                        <label><?php echo htmlspecialchars( $question['choice_text']); ?></label><br>
                        <?php $previous_question_id = $question['question_id']; ?>
                    <?php endforeach; ?>
                </div>
                
                <div style="border: none;" class="achieve-one">
                    <input style="display: none;" type="submit" id="tellUs" value="Submit">
                    <br>
                    <label for="tellUs">Submit</label>
                </div>
                

            </form>
        </div>
        <!-- End of question section-->

    </div>

</main>
<!--end of main section-->


<!--footer section-->
<!--end of footer section-->
</body>
</html>