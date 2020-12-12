


<nav class=topNav>
         
        <?php  
            if (isset($_SESSION['username'])) { 
                
        ?> 
        
        <h1><a class="topNav__title" href="/WorkOutlog/profile.html.php">WorkOutLog</a></h1>

        <?php
        } else {
        ?>

        <h1><a class="topNav__title" href="/WorkOutlog/index.html.php">WorkOutLog</a></h1>

        
        <?php
        }
        ?>
        
        
        <ul class=topNav__linkGroup>
            <li><a href="/WorkOutlog/profile.html.php" class="topNav__link">Profile</a></li>
            <li><a class="topNav__link" id=topNav__addWorkoutBtn>Add Workout</a></li>
            <li><a href="/WorkOutlog/progress.html.php" class="topNav__link">Progress</a></li>
        </ul>
</nav>