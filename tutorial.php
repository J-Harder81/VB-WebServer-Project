<?php
    session_start();
    if (!isset($_SESSION['account_loggedin'])) {
        header('Location: index.php');
        exit;
    }
?>
<?php require "php/functions.php" ?>
<?php
    if(isset($_GET['title'])){
        $tut = urldecode($_GET['title']);
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/home.css">
    <title>Welcome</title>
</head>
<body>
    <?php include "includes/nav.php" ?>
    <?php include "includes/header.php" ?>

    <main>
        <div class="main-left">
            <div class="section-title">Tutorials</div>
            <?php $titles = getTitles() ?>
            <?php
                foreach($titles as $title){
                    ?>
                        <a href="tutorial.php?title=<?php echo urlencode($title['title']) ?>">
                            <?php echo($title['title']) ?>
                        </a>
                    <?php
                }
            ?>
        </div>
        <div class="main-right">
            <?php
            if ($tut) {
                $tutorial = getTutorial($tut);
                if ($tutorial) {
                    // assuming getTutorial returns a single row with 'file' column
                    $filePath = $tutorial['file'];
                    ?>
                    <div class="section-title">
                        Click <a href="<?php echo htmlspecialchars($filePath); ?>" download>here</a> to download this tutorial.
                    </div>

                    <!-- Render PDF inline -->
                    <iframe src="<?php echo htmlspecialchars($filePath); ?>"
                            width="850px" height="1100px" style="border: solid #d4d4d4;">
                    </iframe>
                    <?php
                } else {
                    echo "<p>No tutorial found.</p>";
                }
            } else {
                echo "<p>Select a tutorial from the left.</p>";
            }
            ?>
        </div>

    </main>

    <?php include "includes/footer.php" ?>



    <script src="javascript/script.js"></script>
</body>
</html>
