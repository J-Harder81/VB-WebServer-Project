<?php
    $DATABASE_HOST = 'localhost';
    $DATABASE_USER = 'username';
    $DATABASE_PASS = 'password';
    $DATABASE_NAME = 'databasename';

    /* ===== Connect to the database ===== */
    function dbConnect(){
        // use global variables from config.php
        global $DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME;

        $conn = new mysqli($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME);

        if ($conn->connect_errno != 0) {
            return false;
        } else {
            return $conn;
        }
    }

    /* ===== Get the titles from the tutorials table ===== */
    function getTitles(){
        $conn = dbConnect();
        if (!$conn) {
            return []; // return empty array if connection fails
        }

        $result = $conn->query("SELECT title FROM tutorials");
        $titles = [];

        if ($result) {
            while ($row = $result->fetch_assoc()) {
                $titles[] = $row;
            }
        }

        return $titles;
    }

    /* ===== Get the data from the layers table ===== */
    function getLayers(){
        $conn = dbConnect();
        if (!$conn) {
            return [];
        }

        $result = $conn->query("SELECT * FROM layers ORDER BY id ASC");
        $data = [];

        if ($result) {
            while ($row = $result->fetch_assoc()) {
                $data[] = $row;
            }
        }
        return $data;
    }

    /* ===== Get the tutorial information ===== */
    function getTutorial($title) {
        $conn = dbConnect();

        if (!$conn) {
            return [];
        }

        if ($stmt = $conn->prepare("SELECT * FROM tutorials WHERE title = ?")) {
            $stmt->bind_param("s", $title);
            $stmt->execute();
            $result = $stmt->get_result();

            // If you expect only one tutorial per title:
            $data = $result->fetch_assoc();

            $stmt->close();
            return $data ? $data : [];
        } else {
            // Could not prepare statement
            return [];
        }
    }

    /* ===== Get the layer information ===== */
    function getLayerByTitle($title) {
        $conn = dbConnect();

        if (!$conn) {
            return [];
        }

        if ($stmt = $conn->prepare("SELECT * FROM layers WHERE title = ?")) {
            $stmt->bind_param("s", $title);
            $stmt->execute();
            $result = $stmt->get_result();

            // If you expect only one tutorial per title:
            $data = $result->fetch_assoc();

            $stmt->close();
            return $data ? $data : [];
        } else {
            // Could not prepare statement
            return [];
        }
    }
?>
