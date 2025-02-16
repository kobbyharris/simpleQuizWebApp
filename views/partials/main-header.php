<?php 
?>
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
    
            <?php if(count($_SESSION) > 0): ?>
            <div class="details">
                <img class="headerImage" src="./assets/icons/admin.png" alt="user-profile-pic">
                <p class="headerName"><?= $_SESSION['username']?></p>
            </div>
            <?php endif ?>
            
        </div>
    </header>

    <!-- end of header section-->