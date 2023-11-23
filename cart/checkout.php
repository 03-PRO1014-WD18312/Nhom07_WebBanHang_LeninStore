<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Process the form data
    $name = $_POST['name'];
    $address = $_POST['address'];

    // In a real application, you would typically save this information to a database and handle the payment process.

    // For now, let's just display the information
    echo "<h2>Order Summary</h2>";
    echo "<p>Name: $name</p>";
    echo "<p>Address: $address</p>";

    // You can also include additional processing for the order, such as sending confirmation emails, updating inventory, etc.
}
?>
