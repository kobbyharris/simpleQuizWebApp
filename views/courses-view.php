<!--head section-->
<?php require("../views/partials/main-head.php") ?>
<!--head section-->

<!--header section-->
<?php require('../views/partials/main-header.php'); ?> 
<!-- end of header section-->



    <!--main section-->
    <?php echo hoverStyle("/home")?>
    <main class="inner-container">

        <!--Navigation area-->
        <?php require('../views/partials/main-navigation.php'); ?>
        <!--End of Navigation area-->


        <!--inner main page-->
        <div class="inner-main-page">

            <!--Greetings-->
            <div class="greetings">

                <h1>Questions categories</h1>

                <p>Face the hardest questions</p>
            </div>
                <!--Greetings-->
                <?php 

                $catergories_id = "1"?>

            <!--Course categories-->
            <div class="courses-categories">
                <form class="card-wrapper">
                    <?php foreach($categories as $category): ?>
                            <a style="text-decoration: none;color: var(--clr--mainWhite);" href="<?php echo "/question-view?categories_id={$category["category_id"]}"?>" class="card">
                                <p>
                                    <h3><?php echo $category["category_name"]; ?> </h3>
                                </p>
                            </a>

                    <?php endforeach?>
            </div>
            <!--End of Course categories-->


        </div>

    </main>
    <!--end of main section-->


    <!--footer section-->
    <!--end of footer section-->
</body>
</html>