<?php
    // Change the below variables to reflect your MySQL database details
    $DATABASE_HOST = 'localhost';
    $DATABASE_USER = 'username';
    $DATABASE_PASS = 'password';
    $DATABASE_NAME = 'databasename';
    // Try and connect using the info above
    $con = mysqli_connect($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME);
    // Check for connection errors
    if (mysqli_connect_errno()) {
        // If there is an error with the connection, stop the script and display the error
        exit('Failed to connect to MySQL: ' . mysqli_connect_error());
    }
    // We can utilize the isset() function to check if the form has been submitted
    if (!isset($_POST['username'], $_POST['password'], $_POST['email'])) {
        // Could not get the data that should have been sent
        exit('Please complete the registration form!');
    }
    // Make sure the submitted registration values are not empty
    if (empty($_POST['username']) || empty($_POST['password']) || empty($_POST['email'])) {
        // One or more values are empty.
        exit('Please complete the registration form');
    }
    // Check if the username already exists
    if ($stmt = $con->prepare('SELECT id, password FROM accounts WHERE username = ?')) {
        // Bind parameters (s = string, i = int, b = blob, etc)
        $stmt->bind_param('s', $_POST['username']);
        $stmt->execute();
        // Store the result so we can check if the account exists in the database
        $stmt->store_result();
        // Check if the account exists
        if ($stmt->num_rows > 0) {
            // Username already exists
            echo 'Username already exists! Please choose another!';
        } else {

            // Declare variables
            $registered = date('Y-m-d H:i:s');
            // We do not want to expose passwords in our database, so hash the password and use password_verify when a user logs in
            $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
            // Username does not exist, insert new account
            if ($stmt = $con->prepare('INSERT INTO accounts (username, password, email, registered) VALUES (?, ?, ?, ?)')) {
                // Bind POST data to the prepared statement
                $stmt->bind_param('ssss', $_POST['username'], $password, $_POST['email'], $registered);
                $stmt->execute();
                // Output success message
                // Output success message with link back to login
                echo 'You have successfully registered! Click <a href="/index.php">here</a> to return to the login screen.';
            } else {
                // Something is wrong with the SQL statement, check to make sure the accounts table exists with all 3 fields
                echo 'Could not prepare statement!';
            }

        }
        // Close the statement
        $stmt->close();
    } else {
        // Something is wrong with the SQL statement, check to make sure the accounts table exists with all 3 fields.
        echo 'Could not prepare statement!';
    }
    // Close the connection
    $con->close();
?>
