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
                <h1>Sign in to manage</h1>
                <p>No Admin account yet?<a href="/<?= htmlspecialchars($redirectLink);?>">Sign up</a></p>
            </div>
            
            <form action="" method="post">
                <p>
                <label for="email"></label>
                    <input type="email" name="email" value="<?= htmlspecialchars($userInput['email']) ?>" id="email" placeholder="Email">

                
                    <label for="password"></label>
                    <input type="password" name="password" value="<?= htmlspecialchars($userInput['password']) ?>" id="password" placeholder="Password">
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