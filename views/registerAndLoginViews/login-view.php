<?php require("../views/partials/register-loginHead.php") ?>

<?php if(isset($error)): ?>
    <!--errorbox section-->
    <div style="-webkit-animation-name:popupErrorBox; -moz-animation-name:popupErrorBox; ;animation-name: popupErrorBox;" class="errorBox">
        <?=htmlspecialchars($error) ?>
    </div>
    <!--end of errorbox-->
<?php endif ?>
    


    <?php require("../views/partials/register-loginHeader.php") ?>
    
    <!--main section-->

    <main>

       <div class="outer-container">
            <div class="inner-container">
                <h1>Login</h1>
                <p>Don't have an account yet?<a href="/<?= htmlspecialchars($redirectLink);?>">Sign up</a></p>
            </div>
            
            <form method="post">
                <p>
                    <label for="email"></label>
                    <input type="email" name="email" value="<?= htmlspecialchars($userInput['email']) ?>" id="email" placeholder="Email">

                
                    <label for="password"></label>
                    <input type="password" name="password" value="<?= htmlspecialchars($userInput['password']) ?>" id="password" placeholder="Password">
                </p>

                <p>
                    <!-- <input type="hidden" name="__method" value="me"> -->
                    <button name="submit" id="submit" type="submit"></button>
                    <label for="submit">Continue</label>
                </p>
            </form>
            <div class="slate-line">
                <div></div>
                <span>OR</span>
                <div></div>
            </div>
            <a class="admin-sign" href="/admin">
                <label for="">
                    <img width="35px" src="./assets/icons/admin.png" alt="">
                    <p>Sign in as an admin</p>
                </label>
            </a>
       </div>

    </main>

    <!--end of main section-->
    
</body>
</html>