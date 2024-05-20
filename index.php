<?php
session_start();

if(!isset($_SESSION['username'])) {
    header('Location: login.php');
} 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Foods List</title>
</head>
<body>
    <h1>Welcome! <?php echo $_SESSION['username'];?></h1>
    <a href="logout.php">Logout</a>

    <h1>Foods List</h1>
    <ol>
        <li>Pizza : 25 pesos</li>
        <li>Sushi : 25 pesos</li>
        <li>Tacos : 25 pesos</li>
        <li>Burgers : 25 pesos</li>
        <li>Fries : 25 pesos</li>
        <li>Ice Cream : 25 pesos</li>
    </ol>
    
    <h2>Welcome to our shopping list<h2>
    <form action="handleForms.php" method="POST">
        <p><input type="text" name="title" placeholder="Product name"></p>
        <p><input type="number" name="price" placeholder="Price"></p>
        <p><input type="number" name="quantity" placeholder="Quantity"></p>
        <p><input type="submit" value="Add to cart" name="submitBtn"></p>
    </form>

    <h2>Your Cart</h2>
    <table>
        <thead>
            <tr>
                <th>Product</th>
                <th>Price</th>
                <th>Quantity</th>
                <th>Total</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $total = 0;
            if(isset($_SESSION['cart'])){
                foreach($_SESSION['cart'] as $item){
                    echo "<tr>";
                    echo "<td>" . $item['title'] . "</td>";
                    echo "<td>" . $item['price'] . "</td>";
                    echo "<td>" . $item['quantity'] . "</td>";
                    echo "<td>" . $item['price'] * $item['quantity'] . "</td>";
                    echo "</tr>";
                    $total += $item['price'] * $item['quantity'];
                }
            }
            ?>
        </tbody>
        <tfoot>
            <tr>
                <td colspan="3" align="right"><strong>Total:</strong></td>
                <td><?php echo $total; ?></td>
            </tr>
        </tfoot>
    </table>

    <form action="handleOrder.php" method="POST">
        <input type="hidden" name="total" value="<?php echo $total; ?>">
        <p><Thank you for Buying!></p>
    </form>
</body>
</html>