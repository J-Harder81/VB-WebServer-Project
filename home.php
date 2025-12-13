<?php
    session_start();
    if (!isset($_SESSION['account_loggedin'])) {
        header('Location: index.php');
        exit;
    }
?>
<?php require "php/functions.php" ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/home.css">
    <title>Welcome</title>
</head>
<body id="home">
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
            <div class="section-title">What is a LAMP stack?</div>
            <div class="section-subtitle">Introduction:</div>
            <div class="overview">
                <p>
                    The LAMP stack is a classic open-source framework used to build dynamic web applications. It combines four independent technologies—Linux, Apache, MySQL, and PHP—into a cohesive system where each layer supports a different part of web service delivery. Because of its modular design and long-standing reliability, LAMP remains one of the most widely adopted server environments for learning, development, and production systems.
                </p>
            </div>
            <div class="section-subtitle">What each component does:
                <span style="font-size: 12px; font-weight: normal;">(Click on each component's title to learn more)</span>
            </div>
            <?php $layers = getLayers() ?>
            <div class="lamp">
                <?php
                    foreach($layers as $layer){
                        ?>
                            <div class="lamp-left">
                                <img src="<?php echo $layer['image']; ?>" alt="">
                            </div>
                            <div class="lamp-right">
                                <p class="lamp-title">
                                    <a href="layer.php?title=<?php echo $layer['title'] ?>">
                                        <?php echo $layer['title']; ?>
                                    </a>
                                </p>
                                <p class="description">
                                    <?php echo $layer['description']; ?>
                                </p>
                            </div>
                        <?php
                    }
                ?>
            </div>
            <div class="overview"></div>
            <div class="section-subtitle">How the stack works:</div>
            <div class="overview">
                <img src="assets/images/flow-chart.png" alt="">
                <p>
                    When a user visits a LAMP-based website, their request flows downward through the stack. Apache receives the request and determines whether the content is static or dynamic. If the page requires backend logic, PHP processes the script and communicates with MySQL to retrieve or update data. Throughout the entire process, Linux provides the essential environment that keeps the services running, manages resource usage, and maintains system stability.
                </p>
            </div>
            <div class="section-subtitle">Why LAMP matters:</div>
            <div class="overview">
                <p>
                    The LAMP stack continues to be popular because it is open-source, well-documented, and highly adaptable. Developers benefit from its predictable architecture, large support community, and compatibility with a wide range of hosting providers. For students and professionals alike, learning the LAMP stack offers a strong foundation in understanding how modern web servers, databases, and backend applications function.
                </p>
            </div>
        </div>
    </main>

    <?php include "includes/footer.php" ?>



    <script src="javascript/script.js"></script>
</body>
</html>
