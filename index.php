<!DOCTYPE html>
<html>
<head>
    <title>Product List</title>
</head>
<body>
<style>
    .product-add-container {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 0 40px;
    }

    .product-add-title {
        margin-right: 10px;
    }

    .product-add-buttons {
        margin-left: 10px;
    }

    table {
        border-collapse: collapse;
        width: 100%;
    }

    th, td {
        padding: 8px;
        border-bottom: 1px solid #ddd;
    }

    th {
        text-align: left;
    }

    td {
        text-align: center;
        width: 23%;
    }

    tr:nth-child(even) {
        background-color: #f2f2f2;
    }

    tr:hover {
        background-color: #ddd;
    }

    .custom-button {
        border: 1px solid;
        padding: 10px;
        box-shadow: 5px 5px;
        margin-right: 10px;
    }

</style>

<div class="product-add-container">
    <h2 class="product-add-title">Product List</h2>
    <div class="product-add-buttons">
        <button onclick="redirectToAnotherPage()" class="custom-button">ADD</button>
        <button id="deleteButton" class="custom-button">MASS DELETE</button>
    </div>
</div>

<hr style="width:100%;text-align:left;margin-left:0; height: 2px" ; color="grey">

<br><br>

<form method="post" id="deleteForm">
    <?php

    // // Get the current URL path
    // $currentURL = $_SERVER['REQUEST_URI'];

    // // Check if the current URL ends with "/index.php"
    // if (strpos($currentURL, '/index.php') !== false) {
    //     // Remove "/products.php" from the URL
    //     $newURL = str_replace('/index.php', '/', $currentURL);

    //     // Redirect to the new URL
    //     header('Location: ' . $newURL);
    // }


    // Database connection details
    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "products";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $database);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Delete selected rows
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (isset($_POST['delete'])) {
            $selectedIds = $_POST['delete'];
            $selectedIds = array_map('intval', $selectedIds); // Convert values to integers

            // delete query
            $deleteQuery = "DELETE FROM products WHERE id IN (" . implode(",", $selectedIds) . ")";

            // Execute the delete query
            if ($conn->query($deleteQuery) === TRUE) {
                echo '<script>resetForm();</script>'; // Reset the form
            } else {
                echo "Error deleting rows: " . $conn->error;
            }
        }
    }

    // Fetch data from the database
    $sql = "SELECT * FROM products";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {


        $records = $result->fetch_all(MYSQLI_ASSOC); // Fetch all records into an associative array

        $totalRecords = count($records);
        $columnsPerRow = 4;
        $totalRows = ceil($totalRecords / $columnsPerRow);

        echo '<table>';
        for ($row = 0; $row < $totalRows; $row++) {
            echo '<tr>';
            for ($col = 0; $col < $columnsPerRow; $col++) {
                $recordIndex = $row * $columnsPerRow + $col;
                if ($recordIndex < $totalRecords) {
                    $record = $records[$recordIndex];
                    echo '<td>';
                    echo "<div style='flex: 1;
                        margin: 0 10px; /* Adjust the horizontal margin between boxes as needed */
                        border: 1px solid #000;
                        text-align: center;
                        line-height: 28px;
                        padding-bottom: 15px'>";

                    echo "<div style='position: relative'>";
                    echo '<input type="checkbox" class="delete-checkbox" style="position: absolute; top:5px; left: 5px;" name="delete[]" value="' . $record["id"] . '"><br>';
                    echo "</div>";
                    echo $record["sku"] . "<br>";
                    echo $record["name"] . "<br>";
                    echo $record["price"] . " $<br>";
                    echo $record["productType"] . "<br>";
                    if ($record["productType"] == "DVD") {
                        echo "Size: " . $record["size"] . " MB<br>";
                    }
                    if ($record["productType"] == "Book") {
                        echo "Weight: " . $record["weight"] . " KG<br>";
                    }
                    if ($record["productType"] == "Furniture") {
                        echo "Dimension: " . $record["height"] . "x" . $record["width"] . "x" . $record["length"] . "<br>";
                    }
                    echo '</div>';
                    echo '</td>';
                } else {
                    echo '<td></td>';
                }
            }
            echo '</tr>';
        }
        echo '</table>';
    } else {
        echo "No data found.";
    }

    // Close the database connection
    $conn->close();
    ?>
</form>

<script>
    document.getElementById("deleteButton").addEventListener("click", function (event) {
        event.preventDefault();

        var checkboxes = document.getElementsByClassName('delete-checkbox');
        var checkedIds = [];
        for (var i = 0; i < checkboxes.length; i++) {
            if (checkboxes[i].checked) {
                checkedIds.push(checkboxes[i].value);
            }
        }
        if (checkedIds.length === 0) {
            alert("Please select at least one product to delete.");
        } else {
            if (confirm("Are you sure you want to delete the selected products?")) {
                // Submit the form with selected IDs
                document.getElementById('deleteForm').submit();
            }
        }
    });

    function redirectToAnotherPage() {
        window.location.href = "add-product.php";
    }

    function resetForm() {
        document.getElementById('deleteForm').reset();
    }
</script>
</body>
</html>
