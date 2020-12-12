<?php
if (!isset($_SESSION)) {
    session_start();
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="css/style.css?id=1234">

    <!--icons-->
    <script type="module" src="https://unpkg.com/ionicons@5.1.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule="" src="https://unpkg.com/ionicons@5.1.2/dist/ionicons/ionicons.js"></script>

    <!--fonts-->
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans&display=swap" rel="stylesheet">
    <title>WorkOutLog | Your Workouts</title>

     <!-- javascript -->
     <script type='module' src="/WorkOutLog/src/controllers/workoutController.js" ></script>
</head>
<body>
    
    <?php
    $path = $_SERVER['DOCUMENT_ROOT'];
    $path .= "/WorkOutLog/topNav.html.php";
    include_once($path); ?>

<div class="notice">
            <div class="notice__body">
                <p class="notice__text">Work In Progress!</p>
            </div>
        </div>

        <div id=progress-page></div>

        <div class="spacer"></div>

        <?php
        
        $path = $_SERVER['DOCUMENT_ROOT'];
        $path .= "/WorkOutLog/bottomNav.html.php";
        include_once($path); 
        
        ?>





</body>
</html>

