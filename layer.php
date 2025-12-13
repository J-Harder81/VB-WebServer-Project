<?php
    session_start();
    if (!isset($_SESSION['account_loggedin'])) {
        header('Location: index.php');
        exit;
    }
?>
<?php require "php/functions.php" ?>
<?php
    if (isset($_GET['title'])) {
        $title = urldecode($_GET['title']);
        $layer = getLayerByTitle($title);
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
            <div class="lamp">
                <?php
                    if ($layer){
                        ?>
                            <div class="lamp-left">
                                <img src="<?php echo $layer['image']; ?>" alt="">
                            </div>
                            <div class="lamp-right">
                                <p class="lamp-title" style="font-size: 32px; font-wieght: bold; text-decoration: underline;">
                                    <?php echo $layer['title']; ?>
                                </p>
                                <p class="description">
                                    <?php
                                        if (!empty($layer['file']) && file_exists($layer['file'])) {
                                            echo nl2br(htmlspecialchars(file_get_contents($layer['file'])));
                                        } else {
                                            echo "No such file exists.";
                                        }
                                    ?>
                                </p>
                            </div>
                        <?php
                    } else {
                        echo "<p>Layer not found.</p>";
                    }
                ?>
            </div>
        </div>
    </main>

    <?php include "includes/footer.php" ?>



    <script src="javascript/script.js"></script>
</body>
</html>
