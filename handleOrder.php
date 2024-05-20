<?php
session_start();

if(isset($_POST['placeOrderBtn'])){
    $total = $_POST['total'];

    // Insert order into database
    require_once('dbConfig.php');
    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "INSERT INTO orders (order_total) VALUES (?)";
    $stmt = $conn->prepare($sql);
    if ($stmt === false) {
        echo "Error preparing statement: " . $conn->error;
        exit();
    }

    $stmt->bind_param('s', $total);
    if ($stmt->execute() === false) {
        echo "Error executing statement: " . $stmt->error;
        exit();
    }

    echo "Order placed successfully!";
    unset($_SESSION['cart']);

    $stmt->close();
    $conn->close();
}

header('Location: index.php');
?>