<?php require "php/profile.php" ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/home.css">
    <title>Welcome</title>
</head>
<body id="account">
    <?php include "includes/nav.php" ?>
    <header>
    <h1>Account Profile</h1>
    <p class="sub-title">
        View your profile details below.
    </p>
</header>

    <main>
        <div class="content">

            <div class="block">

                <div class="profile-detail">
                    <strong>Username</strong>
                    <?=htmlspecialchars($_SESSION['account_name'])?>
                </div>

                <div class="profile-detail">
                    <strong>Email</strong>
                    <?=htmlspecialchars($email)?>
                </div>

                <div class="profile-detail">
                    <strong>Registered</strong>
                    <?=htmlspecialchars($registered)?>
                </div>

            </div>

        </div>
    </main>

    <?php include "includes/footer.php" ?>



    <script src="javascript/script.js"></script>
</body>
</html>
