<!--Navigation area-->

<div class="navigation">
        <div class="innerNav">
            <div class="dashboard">
                <a <?php echo hoverStyle("/home")?> href="<?= authorizingUserLogin("/home")?>">
                    <img width="24px" src="./assets/icons/dashboard.svg" alt="dashboard-icon">
                    <span>Dashboard</span>
                </a>
            </div>
            <div class="courses">
                <a <?php echo hoverStyle("/courses")?> href="<?= authorizingUserLogin("/courses")?>">
                    <img width="24px" src="./assets/icons/categories.svg" alt="categories-icon">
                    <span>Courses</span>
                </a>
            </div>
            <?php if(count($_SESSION) > 0): ?>
                <div class="logout">
                    <a <?php echo hoverStyle("/logout")?> href="<?= authorizingUserLogin("/Logout")?>">
                        <img width="24px" src="./assets/icons/logout.svg" alt="layout-icon">
                        <span>Logout</span>
                    </a>
                </div>
            <?php endif ?>
        </div>

        <div class="profile"></div>
    </div>
    <!--End of Navigation area-->

    
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
