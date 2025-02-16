<?php require("../views/partials/register-loginHead.php") ?>

<?php if(isset($error)): ?>
    <!--errorbox section-->
    <div style="-webkit-animation-name:popupErrorBox; -moz-animation-name:popupErrorBox; animation-name: popupErrorBox;" class="errorBox">
        <?= $error ?>
    </div>
    <!--end of errorbox-->
<?php endif ?>

    <?php require("../views/partials/register-loginHeader.php") ?>

    <!--main section-->

    <main>

       <div class="outer-container">
            <div class="inner-container">
                <h1 style="white-space: nowrap;">Create an account.</h1>
                <p>Have an account?<a href="/<?= $redirectLink;?>">Login</a></p>
            </div>
            
            <form method="post">
                <p>
                    <label for="username"></label>
                    <input type="text" name="username" value="<?= htmlspecialchars($userInput['username']) ?>" id="username" placeholder="Username">

                    
                    <label for="email"></label>
                    <input type="email" name="email" value="<?= htmlspecialchars($userInput['email']) ?>" id="email" placeholder="Email">

                
                    <label for="password"></label>
                    <input type="password" name="password" value="<?=htmlspecialchars($userInput['password']) ?>"  id="password" placeholder="Password">
                </p>

                <p>
                    <button name="submit" id="submit" type="submit"></button>
                    <label for="submit">Continue</label>
                </p>
            </form>
       </div>

    </main>
    
    <!--end of main section-->


    <?php require("../views/partials/register-footer.php") ?>
</body>
</html>