<?php require("partials/register-loginHead.php") ?>

<?php if(isset($error)): ?>
    <!--errorbox section-->
    <div style="-webkit-animation-name:popupErrorBox; -moz-animation-name:popupErrorBox; ;animation-name: popupErrorBox;" class="errorBox">
        <?=htmlspecialchars($error) ?>
    </div>
    <!--end of errorbox-->
<?php endif ?>


    <?php require("partials/register-loginHeader.php") ?>
    
    <!--main section-->

    <main>

       <div class="outer-container">
            <div class="inner-container">
                <h1>Register</h1>
                <p>Have an admin account?<a href="/<?= htmlspecialchars($redirectLink);?>">Sign in</a></p>
            </div>
            
            <form action="" method="post">
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
    
</body>
</html>