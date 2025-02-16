<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="Harrison Amoani">
    <meta name="description" content="PQuiz Web App">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="<?= $stylesheetName; ?>.css">
    <link rel="shortcut icon" href="./assets/icons/fav-icon.png" type="image/x-icon">
    <title><?= $title; ?></title>
</head>
<body>
<body>
    <!--header section-->
    <header>
    
        <div class="header-wrapper">
            <label for="mobileNav" class="mobile-nav">
                <img id="close" width="48px" src="./assets/icons/close.svg" alt="close">
                <img id="open" width="48px" src="./assets/icons/menu.svg" alt="open">
            </label>
            <div class="header-container">
                <a style="text-decoration: none;" href="/home">
                    <div class="logo">
                        <h1>P</h1>
                        <p>Quiz</p>
                    </div>
                </a>
            </div>
        </div>
    </header>
    
        <!-- end of header section-->
    <main class="inner-container">

            <!--Navigation area-->
        <div class="navigation">
            <div class="innerNav">
                <div class="dashboard">
                    <a <?php echo hoverStyle("/home")?> href="login">
                        <span>Login</span>
                    </a>
                </div>
                <div class="courses">
                    <a <?php echo hoverStyle("/courses")?> href="/signup">
                        <span>Sign Up</span>
                    </a>
                </div>
            <div class="profile"></div>
        </div>
        <!--End of Navigation area-->
        </div>
        
         <!--inner main page-->
         <div class="inner-main-page">

            <!--Greetings-->
            <div class="greetings">

                <h1>PAGE NOT FOUND</h1>

                <p>Oops 404  missed calls!</p>
                <br>
                <br>
                <div class="details">
                    <p class="signup"><a href="/"><?= $heading ?></a></p>
                </div>
            </div>
            <!--Greetings-->
        </div>
    </main>

    <script>
    // Initially hide the close icon
    document.getElementById("close").style.display = "none";

    document.getElementById("open").addEventListener("click", function() {
        // Show the navigation and hide the open icon, then show the close icon
        document.querySelector(".navigation").classList.add("show");
        document.getElementById("open").style.display = "none";
        document.getElementById("close").style.display = "block";
    });

    document.getElementById("close").addEventListener("click", function() {
        // Hide the navigation and hide the close icon, then show the open icon
        document.querySelector(".navigation").classList.remove("show");
        document.getElementById("close").style.display = "none";
        document.getElementById("open").style.display = "block";
    });
</script>
    <!--end of main section-->                
</body>
</html>