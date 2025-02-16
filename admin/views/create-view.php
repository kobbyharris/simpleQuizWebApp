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
            <h1>Add Questions</h1>
            <p>Fill out all the spaces</p>
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
                <label for="question_text">Question Text:</label><br>
                <textarea name="question_text" id="question_text" rows="3" cols="50" required></textarea><br>
            </div>

            <div class="achieve-two">
                <label for="category_id">Category:</label><br>
                <select name="category_id" id="category_id" required>
                    <?php foreach ($categories as $category): ?>
                        <option value="<?= $category['category_id'] ?>"><?= $category['category_name'] ?></option>
                    <?php endforeach ?>
                </select><br>
            </div>

            <div class="achieve-one">
                <label for="choice1">Choice 1:</label><br>
                <input type="text" name="choices[]" id="choice1"><br>
            </div>
            <div class="achieve-one">
                <label for="choice2">Choice 2:</label><br>
                <input type="text" name="choices[]" id="choice2"><br>
            </div>
            <div class="achieve-one">
                <label for="choice3">Choice 3:</label><br>
                <input type="text" name="choices[]" id="choice3"><br>
            </div>
            <div class="achieve-one">
                <label for="choice4">Choice 4:</label><br>
                <input type="text" name="choices[]" id="choice4"><br>
            </div>
            <div class="achieve-one">
            <label for="correct_choice">Enter Correct Choice:</label>
            <input type="text" id="correct_choice" name="correct_choice" placeholder="Enter correct choice">
            </select>


            </div>
            <div class="achieve-one">
                <button id="addquestions" style="display: none;" type="submit"></button>
                <label for="addquestions">Add Question</label>
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