<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {
    $conn = mysqli_connect('localhost', 'root', '', 'products') or die("Connection Failed: " . mysqli_connect_error());

    if (isset($_POST['sku']) && isset($_POST['name']) && isset($_POST['price']) && isset($_POST['productType']) && isset($_POST['size']) && isset($_POST['weight']) && isset($_POST['height']) && isset($_POST['width']) && isset($_POST['length'])) {
        $sku = $_POST['sku'];
        $name = $_POST['name'];
        $price = $_POST['price'];
        $productType = $_POST['productType'];
        $size = $_POST['size'];
        $weight = $_POST['weight'];
        $height = $_POST['height'];
        $width = $_POST['width'];
        $length = $_POST['length'];


        // Escape user inputs to prevent SQL injection
        $sku = mysqli_real_escape_string($conn, $sku);
        $name = mysqli_real_escape_string($conn, $name);
        $price = mysqli_real_escape_string($conn, $price);
        $productType = mysqli_real_escape_string($conn, $productType);
        $size = mysqli_real_escape_string($conn, $size);
        $weight = mysqli_real_escape_string($conn, $weight);
        $height = mysqli_real_escape_string($conn, $height);
        $width = mysqli_real_escape_string($conn, $width);
        $length = mysqli_real_escape_string($conn, $length);

        // Insert into the 'products' table
        $sql = "INSERT INTO `products` (`sku`, `name`, `price`, `productType`, `size`, `weight`, `height`, `width`, `length`) VALUES ('$sku', '$name', '$price', '$productType', '$size', '$weight', '$height', '$width', '$length')";

        $query = mysqli_query($conn, $sql);

        // Check if the query was successful
        if ($query) {
            // Redirect to another page
            header("Location: index.php");
            exit(); // Terminate the current script to ensure the redirect happens
        } else {
            echo 'Error Occurred: ' . mysqli_error($conn);
        }

    }
}
?>